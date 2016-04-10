<div class="shift night-shift" data-id="{{ $schedule->id }}" data-type="" data-station-id="">
    <button type="button" class="btn btn-primary btn-flat" data-target="#myModal">
        <i class="fa fa-moon-o"></i>
        <br/>
        <small>{{ $schedule->employee_task->name }}</small>
        <br/>
        <small class="no-margin no-padding text-wrap">{{ $schedule->station->name }}</small>
    </button>
</div>

<div id="myModal"></div>