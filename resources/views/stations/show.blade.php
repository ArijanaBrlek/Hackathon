@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection


@section('main-content')
    <h1>Station</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $station->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection