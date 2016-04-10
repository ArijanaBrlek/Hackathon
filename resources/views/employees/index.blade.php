@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection

@section('main-content')

    <h1>Employees <a href="{{ url('employees/create') }}" class="btn btn-primary pull-right btn-sm">Add New Employee</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>First Name</th><th>Last Name</th><th>OIB</th><th>Matična ustanova</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($employees as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('employees', $item->id) }}">{{ $item->first_name }}</a></td><td>{{ $item->last_name }}</td><td>{{ $item->OIB }}</td><td>{{ $item->station->name  }}</td>
                    <td>
                        <a href="{{ url('employees/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['employees', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $employees->render() !!} </div>
    </div>

@endsection

