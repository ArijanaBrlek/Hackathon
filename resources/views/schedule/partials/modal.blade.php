<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Details</h4>
            </div>

            <div class="modal-body">

                    {{--{!! Form::model($station, ['method' => 'PATCH', 'url' => ['schedule', $station->id], 'class' => 'form-horizontal']) !!}--}}
                    {!! Form::model($schedule, ['method' => 'PATCH', 'class' => '']) !!}

                    <div class="form-group full-width">
                        {!! Form::label('stations', 'Station', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 full-width">
                            <select name="station" class="form-control select2 station" data-placeholder="Station" data-schedule-id="{{ $schedule->id }}">
                                @foreach($stations as $station)
                                    <option value="{{ $station->id }}" {{ $schedule->station_id == $station->id ? 'selected' : '' }} data-team-count="{{ $station->teams->groupBy('team_type_id')->count() }}">{{ $station->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        {!! Form::label('STATUS', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="status" class="form-control select2" data-placeholder="Employee type">
                                <option value="D" {{ $schedule->type == 'D' ? 'selected' : '' }}>Day</option>
                                <option value="N" {{ $schedule->type == 'N' ? 'selected' : '' }}>Night</option>
                                <option value="_" {{ $schedule->type == '_' ? 'selected' : '' }}>Day off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        {!! Form::label('team', 'Team', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="team" class="form-control select2 team-select" data-placeholder="Select employee team">

                            </select>
                        </div>
                    </div>

                <div class="form-group full-width">
                    {!! Form::label('employee_type', 'Employee type', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        <select name="employee_type" class="form-control select2" data-placeholder="Employee type">
                            <option value="D" {{ $schedule->employee_task->code == 'D' ? 'selected' : '' }}>Dispatcher</option>
                            <option value="M" {{ $schedule->employee_task->code == 'M' ? 'selected' : '' }}>Doctor</option>
                            <option value="T" {{ $schedule->employee_task->code == 'T' ? 'selected' : '' }}>Medical technician</option>
                            <option value="V" {{ $schedule->employee_task->code == 'V' ? 'selected' : '' }}>Driver</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Update', ['id' => 'schedule-save', 'class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script>
    $(".select2").select2();
    $(function(){
        if($("option:selected", $('form .team-select')).attr('data-team-count') == 2) {
            var shifts = ["Primary", "Secondary"];
        } else {
            var shifts = ["Secondary"];
        }
        var sel = $('form .team-select')[0];

        $('form .team-select').select2("val", "");
        sel.options.length = 0;
        for(var i = 0; i < shifts.length; i++) {
            var opt = document.createElement('option');
            opt.innerHTML = shifts[i];
            opt.value = i;
            sel.appendChild(opt);
        }

        $('.station').change(function(e) {

            console.log("dskjfjdks");

            if($("option:selected", this).attr('data-team-count') == 2) {
                var shifts = ["Primary", "Secondary"];
            } else {
                var shifts = ["Secondary"];
            }
            var sel = $('form .team-select')[0];

            $('form .team-select').select2("val", "");
            sel.options.length = 0;
            for(var i = 0; i < shifts.length; i++) {
                var opt = document.createElement('option');
                opt.innerHTML = shifts[i];
                opt.value = i;
                sel.appendChild(opt);
            }
        });

        $('#schedule-save').click(function() {
            var station = $('#myModal select[name="station"]').val(),
                    status = $('#myModal select[name="status"]').val(),
                    team = $('#myModal select[name="team"]').val(),
                    employeeType = $('#myModal select[name="employee_type"]').val();
            var scheduleId = $('#myModal select[name="station"]').attr('data-schedule-id');

            $.post('/schedule/update/' + scheduleId, { station: station, status: status, team: team, employee_type: employeeType }, function(data) {
                data = $.parseJSON(data);
                $('.schedule[data-id="' + scheduleId + '"]').replaceWith(data.data);
                $('#myModal').modal('hide');
            })
        });
    });
</script>