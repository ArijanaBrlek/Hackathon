@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection


@section('main-content')

    <h1>Employee</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>First Name</th><th>Last Name</th><th>OIB</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $employee->id }}</td> <td> {{ $employee->first_name }} </td><td> {{ $employee->last_name }} </td><td> {{ $employee->OIB }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection