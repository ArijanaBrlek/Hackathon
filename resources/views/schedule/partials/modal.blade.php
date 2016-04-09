<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Details</h4>
            </div>

            <div class="modal-body">

                    {{ $schedule->id }}
                    @foreach($stations as $station)
                        {{ $station->id }}
                    @endforeach
                    @foreach($task_types as $task_type)
                        {{ $task_type }}
                    @endforeach

                    {{--{!! Form::model($station, ['method' => 'PATCH', 'url' => ['schedule', $station->id], 'class' => 'form-horizontal']) !!}--}}
                    {!! Form::model($station, ['method' => 'PATCH', 'class' => '']) !!}

                    <div class="form-group full-width">
                        {!! Form::label('stations', 'Station', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6 full-width">
                            <select name="primary" class="form-control select2 station" data-placeholder="Station">
                                @foreach($stations as $station)
                                    <option value="{{ $station->id }}">{{ $station->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        {!! Form::label('STATUS', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="primary" class="form-control select2" data-placeholder="Employee type">
                                <option value="D">Day</option>
                                <option value="N">Night</option>
                                <option value="_">Day off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        {!! Form::label('team', 'Shift', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="primary" class="form-control select2 team-select" multiple="multiple" data-placeholder="Select employee shift">

                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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

        $('.station').change(function(e) {

            console.log("dskjfjdks");

            var shifts = ["Day", "Indian"];
            var sel = $('form .team-select')[0];

            $('form .team-select').select2("val", "");
            sel.options.length = 0;
            for(var i = 0; i < shifts.length; i++) {
                var opt = document.createElement('option');
                opt.innerHTML = shifts[i];
                opt.value = shifts[i];
                sel.appendChild(opt);
            }
        });
    });
</script>