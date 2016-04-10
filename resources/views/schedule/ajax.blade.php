<div class="schedule" data-id="{{ $schedule->id }}">
    @if ($schedule->type == 'D')
        <div class="col-lg-6 col-md-6 col-sm-12 no-padding no-margin">
            @include('schedule.partials.day')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 no-padding no-margin no-shift">
            @include('schedule.partials.night_disabled')
        </div>
    @endif
    @if ($schedule->type == 'N')
        <div class="col-lg-6 col-md-6 col-sm-12 no-padding no-margin no-shift">
            @include('schedule.partials.day_disabled')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 no-padding no-margin ">
            @include('schedule.partials.night')
        </div>
    @endif


    <div class="row col-lg-12 col-md-12 col-sm-12 no-padding no-margin">
        @if ($schedule->type == '_')
            @include('schedule.partials.dayoff')
        @endif
    </div>
</div>