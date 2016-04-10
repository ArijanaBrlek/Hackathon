<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;

class GenerateScheduleController extends Controller
{
    public function generate() {
        $filename = "data.txt";

        //num of weeks
        $n = 4;

        //num of stations
        $stations = Station::all();
        $out = $n."\n";
        $out .= $stations->count()."\n";

        foreach ($stations as $station) {
            $teams = $station->teams()->orderBy('team_type_id')->get();
            $grouped = $teams->groupBy('team_type_id');

            foreach($grouped as $key => $teams) {
//                dump($team->team_type);
                foreach($teams as $team) {
                    $out .= $team->employee_type->code;
                }
                $out .= " ";
            }
            $out .= "\n";
        }

        $employees = Employee::all();
        $out .= $employees->count()."\n";
        foreach($employees as $employee) {
            $out .= $employee->station_id;
            $out .= " ";
            $i = 0;

            foreach($employee->preferences_employee_types as $pet) {
                if($i == $n * 7) break;
                $out .= $pet->employee_type->code;

                ++$i;
            }
            $out .= " ";

            $i = 0;
            foreach($employee->preferences_plan_types as $ppt) {
                if($i == $n * 7) break;

                $out .= $ppt->plan_type->code;
                ++$i;
            }

            $out .= "\n";
        }

        $input_path = base_path().'/public/output/input.txt';
        $output_path = base_path().'/public/output/output.txt';
        $jar_path = base_path().'/public/output/hackaton.jar';
        file_put_contents($input_path, $out);
        exec('/usr/bin/java -jar '.$jar_path.' '.$input_path.' '.$output_path, $output);
        return \Redirect::route('schedule');
    }
}
