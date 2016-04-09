<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Details</h4>
            </div>
            <div class="modal-body">
                <div>
                    {{ $schedule->id }}
                    @foreach($stations as $station)
                        {{ $station->id }}
                    @endforeach
                    @foreach($task_types as $task_type)
                        {{ $task_type }}
                    @endforeach

{{--                    {!! Form::model($station, ['method' => 'PATCH', 'url' => ['schedule', $station->id], 'class' => 'form-horizontal']) !!}--}}
                    {!! Form::model($station, ['method' => 'PATCH', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        {!! Form::label('team1', 'Station', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="primary" class="form-control select2 station" multiple="multiple" data-placeholder="Select employee type">
                                @foreach($stations as $station)
                                    <option value="{{ $station->id }}">{{ $station->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('STATUS', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="primary" class="form-control select2" multiple="multiple" data-placeholder="Select employee type">
                                <option value="D">Day</option>
                                <option value="N">Night</option>
                                <option value="_">Day off</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('team', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            <select name="primary" class="form-control team-select select2" multiple="multiple" data-placeholder="Select employee type">

                            </select>
                        </div>
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
            var cuisines = ["Chinese", "Indian"];
            var sel = $('form .team-select')[0];

            $('form .team-select').select2("val", "");
            sel.options.length = 0;
            for(var i = 0; i < cuisines.length; i++) {
                var opt = document.createElement('option');
                opt.innerHTML = cuisines[i];
                opt.value = cuisines[i];
                sel.appendChild(opt);
            }
        });
    });
</script>