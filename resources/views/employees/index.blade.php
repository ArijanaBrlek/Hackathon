@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection

@section('main-content')

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">
                <a href="{{ url('employees/create') }}" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Add</a>

            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div class="table">
                <table id="datatable" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>OIB</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Base station</th>
                        <th>Phone</th>
                        <th class="txt-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($employees as $item)
                        {{-- */$x++;/* --}}
                        <tr>

                            <td><a href="{{ url('employees', $item->id) }}">{{ $item->first_name }} {{ $item->last_name }}</a></td>
                            <td>{{ $item->OIB }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->station->name  }}</td>
                            <td>{{ $item->phone}}</td>
                            <td class="text-right">
                                <a href="{{ url('employees/' . $item->id . '/edit') }}">
                                    <button type="submit" class="btn btn-primary btn-flat">Update</button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['employees', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $employees->render() !!} </div>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection



@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#datatable').DataTable();


        });



    </script>


@endsection
