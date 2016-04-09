<?php

namespace App\Http\Controllers;

use App\EmployeeType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
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

}
