<?php

namespace App\Http\Controllers;

use App\Employee;
use App\PlanType;
use App\Schedule;
use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schedule.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajax() {
        $schedules = Schedule::all();
        $grouped = $schedules->groupBy('employee_id');

        $calendar = [];
        foreach($grouped as $employee_id => $schedules) {
            $employee = Employee::find($employee_id);
            $row = [];
            $row[] = $employee->first_name . " " . $employee->last_name;
            foreach($schedules as $schedule) {
                $view = \View::make('schedule.ajax', compact('schedule'));
                $row[] = $view->render();
            }
            $calendar[] = $row;
        }

        $response = ['data' => $calendar];
        return json_encode($response, JSON_UNESCAPED_SLASHES);
    }

    public function modal(Schedule $schedule) {
        $stations = Station::all();
        $plan_types = PlanType::all();
        $task_types = ['D', 'N', '_'];
        $response = ['data' => \View::make('schedule.partials.modal', compact('schedule', 'stations', 'task_types', 'plan_types'))->render()];
        return json_encode($response, JSON_UNESCAPED_SLASHES);
    }
}
