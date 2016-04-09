<?php

namespace App\Http\Controllers;

use App\Employee;
use App\PlanType;
use App\PreferencesPlanType;
use App\Schedule;
use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plan.home');
    }

    public function ajax(Request $request) {
        $plans = PreferencesPlanType::whereWeek($request->get('week', 1))->get();
        $grouped = $plans->groupBy('employee_id');
        $plan_types = PlanType::all();

        $calendar = [];
        foreach($grouped as $employee_id => $plans) {
            $employee = Employee::find($employee_id);
            $row = [];
            $row[] = $employee->first_name . " " . $employee->last_name;
            foreach($plans as $plan) {
                $view = \View::make('plan.ajax', compact('plan', 'plan_types'));
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

    public function updateAjax(Request $request, PreferencesPlanType $plan) {
        $plan->plan_type_id = PlanType::whereCode($request->get('plan_type_code'))->first()->id;
        $plan->save();
    }
}
