<div class="row no-padding no-margin">
    <div class="col-sm-6 no-padding no-margin">
        @if ($schedule->type == 'D')
            @include('schedule.partials.day')
        @endif
    </div>
    <div class="col-sm-6">
        @if ($schedule->type == 'N')
            @include('schedule.partials.night')
        @endif
    </div>
</div>

<div class="col-lg-12 col-sm-12 no-padding no-margin">
    @if ($schedule->type == '_')
        @include('schedule.partials.dayoff')
    @endif
</div>