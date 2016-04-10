@extends('layouts.app')

@section('htmlheader_title')
    Employee - Edit
    @endsection

    @section('main-content')

        <section class="row">
            <div class="col-sm-offset-1 col-sm-10">

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Add employee</h3>
                    </div>
                    {!! Form::model($employee, [
            'method' => 'PATCH',
            'url' => ['employees', $employee->id],
            'class' => 'form-horizontal form-padding'
        ]) !!}

                    <div class="box-body">



                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                                {!! Form::label('first_name', 'First Name: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                                {!! Form::label('last_name', 'Last Name: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('OIB') ? 'has-error' : ''}}">
                                {!! Form::label('OIB', 'Oib: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('OIB', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('OIB', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                                {!! Form::label('gender', 'Gender: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                {!! Form::label('address', 'Address: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                                {!! Form::label('city', 'City: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">
                            <div class="form-group {{ $errors->has('station_id') ? 'has-error' : ''}}">
                                {!! Form::label('station_id', 'Station: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    <select name="station_id" class="form-control select2"
                                            data-placeholder="Select employee type">
                                        @foreach($stations as $station)
                                            <option value="{{ $station->id }}" {{ $station->id == $employee->station_id ? 'selected' : '' }}>{{ $station->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">

                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                {!! Form::label('phone', 'Phone: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">

                            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                {!! Form::label('mobile', 'Mobile: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">

                            <div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
                                {!! Form::label('remark', 'Remark: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('remark', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row full-width">

                            <div class="form-group">
                                {!! Form::label('preferences_employee_types', 'Preferred employee types: ', ['class' => 'col-sm-3 control-label text-right']) !!}
                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <select name="preferences_employee_types[]" multiple="multiple"
                                                class="form-control select2" data-placeholder="Select employee types">
                                            @foreach($employee_types as $employee_type)
                                                <option value="{{ $employee_type->id }}" {{ in_array($employee_type->id, $employee->preferences_employee_types->pluck('employee_type_id')->toArray()) ? 'selected' : '' }}>{{ $employee_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
</div>
                        </div>

                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-2 pull-right">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary btn-flat form-control pull-right']) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                </div>
            </div>
        </section>

@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.min.js') }}"></script>
    <script>
        $(".select2").select2();
    </script>


@endsection