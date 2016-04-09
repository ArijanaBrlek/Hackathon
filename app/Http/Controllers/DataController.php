<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;

class DataController extends Controller
{
    public function createIputFile()
    {
        $filename = "";

        //num of weeks
        $n = 4;

        //num of stations
        $stations = Station::all();
        $m = $stations.count();

        foreach ($stations as $station) {

        }


    }
}
