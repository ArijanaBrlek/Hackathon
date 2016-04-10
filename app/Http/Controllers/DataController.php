<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeType;
use App\Schedule;
use App\Station;
use App\Team;
use App\TeamType;
use Illuminate\Http\Request;

use App\Http\Requests;

class DataController extends Controller
{
    public function createInputFile()
    {
//        $filename = "";
//
//        //num of weeks
//        $n = 4;
//
//        //num of stations
//        $stations = Station::all();
//        echo "<pre>";
//        echo $n."\n";
//        echo $stations->count()."\n";
//
//        foreach ($stations as $station) {
//            $teams = $station->teams()->orderBy('team_type_id')->get();
//            $grouped = $teams->groupBy('team_type_id');
//
//            foreach($grouped as $key => $teams) {
////                dump($team->team_type);
//                foreach($teams as $team) {
//                    echo $team->employee_type->code;
//                }
//                echo " ";
//            }
//            echo "\n";
//
//        }
//
//        $employees = Employee::all();
//        echo $employees->count()."\n";
//        foreach($employees as $employee) {
//            echo $employee->station_id;
//            echo " ";
//            $i = 0;
//
//            foreach($employee->preferences_employee_types as $pet) {
//                if($i == $n * 7) break;
//                echo $pet->employee_type->code;
//
//                ++$i;
//            }
//            echo " ";
//
//            $i = 0;
//            foreach($employee->preferences_plan_types as $ppt) {
//                if($i == $n * 7) break;
//
//                echo $ppt->plan_type->code;
//                ++$i;
//            }
//
//            echo "\n";
//        }
//
//        echo "</pre>";

    }

    public function readOutputFile() {
        \DB::table('schedules')->truncate();
        $path = base_path().'/public/output/output.txt';
        $e = Employee::all()->count();
        $employees = Employee::all();
        $stations = Station::orderBy('id')->get();
        $n = 0;

        $days = 1;
        $year = 2016;

        $handle = fopen($path, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $n++;
                $line = trim($line);
                $dayTasks = explode(" ", $line);
                foreach ($dayTasks as $task) {
                    $task = trim($task);
//                    dump($task);

                    if ($task == "_") {
                        $stationId = null;
                        $typeId = null;
                        $shift = '_';
                        $taskCode = null;
//                        dump("day off");
                    } else {
                        $param = explode("-", $task);
//                        dump($param);
                        $stationId = $param[0];
//                        dump($stationId);
                        $typeId = $param[1];
                        $shift = $param[2];
                        $taskCode = $param[3];
//                        dump($stationId, $typeId, $shift, $taskCode);
//                        if($stationId == "1") {
//                            dump('bok');
//                        }
//                        dump($param);
                    }
//                    dump($stationId);

                    $bok = Schedule::create([
                        'year' => $year,
                        'week' => ceil($days / 7),
                        'day' => ($days % 7 == 0) ? 7 : ($days % 7),
                        'employee_id' => $employees[$n-1]->id,
                        'station_id' => $stationId !== null ? $stations[$stationId]->id : null,
                        'type' => $shift,
                        'employee_task_id' => $taskCode ? EmployeeType::whereCode($taskCode)->first()->id : null,
                        'team_type_id' => $typeId !== null ? TeamType::whereCode($typeId)->first()->id : null
                    ]);

//                    if($stationId == "1") {
//                        dump($bok);
//                    }
//                    if($stationId > 3) {
//                        dump($stationId);
//                    }
                }

            }

            fclose($handle);
        } else {
        }

    }
}
