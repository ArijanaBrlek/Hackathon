<div class="shift day-shift no-padding no-margin" data-id="{{ $schedule->id }}" data-type="" data-station-id="">
    <button type="button" class="btn btn-warning btn-flat no-padding no-margin" data-target="#myModal">
        <i class="fa fa-sun-o icon-small"></i>
        <br/>
        <small>{{ $schedule->employee_task->name }}</small>
        <br/>
        <small class="no-margin no-padding text-wrap">{{ $schedule->station->name }}</small>
    </button>
</div>
<div id="myModal"></div>