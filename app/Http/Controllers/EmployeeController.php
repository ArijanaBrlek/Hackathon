<?php

namespace App\Http\Controllers;

use App\EmployeeType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
use App\PreferencesPlanType;
use App\Schedule;
use App\Station;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $employees = Employee::paginate(15);

        return view('employees.index', compact('employees'));
    }


    public function report()
    {
        $employees = Employee::all();
        return view('employees.report', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Employee::create($request->all());

        Session::flash('flash_message', 'Employee added!');

        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $stations = Station::all();
        $employee_types = EmployeeType::all();
        return view('employees.edit', compact('employee', 'stations', 'employee_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        $employee_type_ids = $request->get('preferences_employee_types', []);

        $employee->preferences_employee_types()->delete();

        foreach($employee_type_ids as $id) {
            $employee->preferences_employee_types()->create([
                'employee_type_id' => $id
            ]);
        }

        Session::flash('flash_message', 'Employee updated!');

        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);

        Session::flash('flash_message', 'Employee deleted!');
        return redirect('employees');
    }


    public function ajaxHours(Request $request) {

        $matchThese = ['type' => 'D', 'type' => 'N'];
        $results = Schedule::where($matchThese)->get();
        $grouped = $results->groupBy('employee_id');

        $data = [];
        foreach($grouped as $employee_id => $schedules) {
            $employee = Employee::find($employee_id);
            $name = $employee->first_name . " " . $employee->last_name;
            $hours = count($grouped->get($employee->id)) * 12;
            $row = [$name, $hours];
            $data[] = $row;
        }

        $response = ['data' => $data];
        return json_encode($response);
    }

    public function ajaxVacations(Request $request) {
        $matchThese = ['type' => '_'];
        $results = Schedule::where($matchThese)->get();
        $grouped = $results->groupBy('employee_id');

        $data = [];
        foreach($grouped as $employee_id => $schedules) {
            $employee = Employee::find($employee_id);
            $name = $employee->first_name . " " . $employee->last_name;
            $hours = 0;
            foreach($schedules as $schedule) {
                $plan = PreferencesPlanType::where('year', 2016)
                    ->where('week', $schedule->week)
                    ->where('day', $schedule->day)
                    ->first();

                if($plan->plan_type->code == 'G') {
                    $hours++;
                }
            }
            $row = [$name, $hours];
            $data[] = $row;
        }

        $response = ['data' => $data];
        return json_encode($response);
    }

    public function ajaxOvertimes(Request $request) {
        $matchThese = ['type' => 'D', 'type' => 'N'];
        $results = Schedule::where($matchThese)->get();
        $grouped = $results->groupBy('employee_id');

        $data = [];
        foreach($grouped as $employee_id => $schedules) {
            $employee = Employee::find($employee_id);
            $name = $employee->first_name . " " . $employee->last_name;
            $weeks = $schedules->groupBy('week');
            $overtimes = 0;
            foreach($weeks as $week => $week_schedules) {
                $hours = count($week_schedules) * 12;
                if($hours > 40) {
                    $overtimes += $hours - 40;
                }
            }

            $row = [$name, $overtimes];
            $data[] = $row;
        }

        $response = ['data' => $data];
        return json_encode($response);

    }

    public function ajax(Employee $employee) {
        $data = [];
        $data['station'] = $employee->station->name;
        
        $matchThese = ['type' => 'D', 'type' => 'N'];
        $schedules = $employee->schedules()->where($matchThese)->get();

        $sum = $schedules->count();

        $pieData = [];
        $grouped = $schedules->groupBy('station_id');

        $colors = ['#f56954', '#00a65a', '#008080', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];
        foreach($grouped as $station_id => $station_schedules) {
            $station = Station::find($station_id);
            $pieData[] = [
                'value' => $station_schedules->count() / $sum * 100,
                'label' => $station->name,
                'color' => $colors[rand(0, count($colors)-1)]
            ];
        }
        
        $data['pieData'] = $pieData;

        return json_encode($data);
    }

}
