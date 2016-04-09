@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection


@section('main-content')

    <h1>Edit Station</h1>
    <hr/>

    {!! Form::model($station, [
        'method' => 'PATCH',
        'url' => ['stations', $station->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                    {!! Form::label('address', 'Address: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('team1', 'Primary team: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        <select name="primary[]" class="form-control select2" multiple="multiple" data-placeholder="Select primary type">
                            @foreach($employee_types as $employee_type)
                                <option value="{{ $employee_type->code }}" {{ in_array($employee_type->code, $primary_team_codes) ? 'selected' : '' }}>{{ $employee_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('teamSecondary', 'Secondary team: ', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        <select name="secondary[]" class="form-control select2" multiple="multiple" data-placeholder="Select secondary team">
                            @foreach($employee_types as $employee_type)
                                <option value="{{ $employee_type->code }}" {{ in_array($employee_type->code, $secondary_team_codes) ? 'selected' : '' }}>{{ $employee_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection

@section('scripts')
    @parent
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.min.js') }}"></script>
    <script>
        $(function() {
            $(".select2").select2();
        });
    </script>

@endsection