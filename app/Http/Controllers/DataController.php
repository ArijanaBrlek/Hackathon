<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;

class DataController extends Controller
{
    public function createInputFile()
    {
        $filename = "";

        //num of weeks
        $n = 4;

        //num of stations
        $stations = Station::all();
        echo "<pre>";
        echo $n."<br />";
        echo $stations->count()."<br />";

        foreach ($stations as $station) {
            $teams = $station->teams()->orderBy('team_type_id')->get();
            $grouped = $teams->groupBy('team_type_id');

            foreach($grouped as $key => $teams) {
//                dump($team->team_type);
                foreach($teams as $team) {
                    echo $team->employee_type->code;
                }
                echo " ";
            }

        }
        echo "\n";

        $employees = Employee::all();
        echo $employees->count()."\n";
        foreach($employees as $employee) {
            echo $employee->station_id;
            echo " ";
            $i = 0;

            foreach($employee->preferences_employee_types as $pet) {
                if($i == $n * 7) break;
                echo $pet->employee_type->code;

                ++$i;
            }
            echo " ";

            $i = 0;
            foreach($employee->preferences_plan_types as $ppt) {
                if($i == $n * 7) break;

                echo $ppt->plan_type->code;
                ++$i;
            }

            echo "\n";
        }

        echo "</pre>";

    }

    public function readOutputFile() {
        $e = Employee::all()->count();
        $n = 4;

        foreach(file('file.txt') as $line) {

        }
    }
}
