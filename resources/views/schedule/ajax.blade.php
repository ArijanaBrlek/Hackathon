<div class="row">
    <div class="col-sm-6">
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