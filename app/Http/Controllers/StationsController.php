<?php

namespace App\Http\Controllers;

use App\EmployeeType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Station;
use App\Team;
use App\TeamType;
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
        $primary_team_type = TeamType::whereCode('0')->first();
        $primary_team = $station->teams()->whereTeamTypeId($primary_team_type->id)->get();
        $primary_team_codes = [];
        foreach($primary_team as $member) {
            $primary_team_codes[] = $member->employee_type->code;
        }

        $secondary_team_type = TeamType::whereCode('1')->first();
        $secondary_team = $station->teams()->whereTeamTypeId($secondary_team_type->id)->get();
        $secondary_team_codes = [];
        foreach($secondary_team as $member) {
            $secondary_team_codes[] = $member->employee_type->code;
        }

        return view('stations.edit', compact('station', 'employee_types', 'primary_team_codes', 'secondary_team_codes'));
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

        $primary_team_codes = $request->get('primary', []);
        $secondary_team_codes = $request->get('secondary', []);

        $station->teams()->delete();

        foreach($primary_team_codes as $code) {
            Team::create([
                'station_id' => $station->id,
                'team_type_id' => TeamType::whereCode('0')->first()->id,
                'employee_type_id' => EmployeeType::whereCode($code)->first()->id,
            ]);
        }

        foreach($secondary_team_codes as $code) {
            Team::create([
                'station_id' => $station->id,
                'team_type_id' => TeamType::whereCode('1')->first()->id,
                'employee_type_id' => EmployeeType::whereCode($code)->first()->id,
            ]);
        }

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
