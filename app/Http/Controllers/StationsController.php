<?php

namespace App\Http\Controllers;

use App\EmployeeType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Station;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $stations = Station::paginate(15);

        return view('stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $employee_types = EmployeeType::all();

        return view('stations.create', compact('employee_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Station::create($request->all());

        Session::flash('flash_message', 'Station added!');

        return redirect('stations');
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
        $station = Station::findOrFail($id);

        return view('stations.show', compact('station'));
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
        $station = Station::findOrFail($id);
        $employee_types = EmployeeType::all();

        return view('stations.edit', compact('station', 'employee_types'));
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
        
        $station = Station::findOrFail($id);
        $station->update($request->all());

        Session::flash('flash_message', 'Station updated!');

        return redirect('stations');
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
        Station::destroy($id);

        Session::flash('flash_message', 'Station deleted!');

        return redirect('stations');
    }

}
