@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection


@section('main-content')

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">
                <a href="{{ url('stations/create') }}" class="btn btn-primary btn-flat">
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
                        <th>Address</th>
                        <th>Primary team</th>
                        <th>Secondary team</th>
                        <th class="txt-right"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($stations as $item)
                        <tr>
                            <td><a>{{ $item->name }}</a></td>
                            <td>{{ $item->address }}</td>

                                <?php $n = 0; ?>
                                @foreach($item->teams()->get()->groupBy('team_type_id') as $team_type_id => $teams)
                                    <?php ++$n ?>
                                    <td>
                                        @foreach($teams as $t)
                                            {{ $t->employee_type->name }}
                                        @endforeach
                                    </td>
                                @endforeach

                                @if($n == 0)
                                    <td></td><td></td>
                                @elseif($n == 1)
                                    <td></td>
                                @endif


                            <td class="pull-right" >
                                <a href="{{ url('stations/' . $item->id . '/edit') }}">
                                    <button type="submit" class="btn btn-primary btn-flat">Update</button>
                                </a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['stations', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $stations->render() !!} </div>
            </div>

        </div>
        <!-- /.box-body -->
    </div>

@endsection
