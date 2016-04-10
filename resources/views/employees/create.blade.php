@extends('layouts.app')

@section('htmlheader_title')
    Stations
@endsection


@section('main-content')

    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Add employee</h3>
                </div>

                {!! Form::open(['url' => 'employees', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                        {!! Form::label('first_name', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                        {!! Form::label('last_name', 'Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('OIB') ? 'has-error' : ''}}">
                        {!! Form::label('OIB', 'Oib: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('OIB', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('OIB', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                        {!! Form::label('gender', 'Gender: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('gender', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        {!! Form::label('address', 'Address: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                        {!! Form::label('city', 'City: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('station_id') ? 'has-error' : ''}}">
                        {!! Form::label('station_id', 'Station Id: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::number('station_id', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('station_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                        {!! Form::label('phone', 'Phone: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                        {!! Form::label('mobile', 'Mobile: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
                        {!! Form::label('remark', 'Remark: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('remark', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="col-sm-2 pull-right">
                                {!! Form::submit('Create', ['class' => 'btn btn-primary btn-flat form-control pull-right']) !!}
                            </div>
                        </div>
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


            </div>
        </div>
    </div>

@endsection