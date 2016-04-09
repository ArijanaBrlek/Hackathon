<form>
    <div class="form-group">
        <select class="plan-type form-control" data-plan-id="{{ $plan->id }}" data-placeholder="Select plan type">
            @foreach($plan_types as $plan_type)
                <option value="{{ $plan_type->code }}" {{ $plan->plan_type->id == $plan_type->id ? 'selected' : '' }}>{{ $plan_type->name }}</option>
            @endforeach
        </select>
    </div>
</form>
{{--<div class="row no-padding no-margin">--}}
    {{--<div class="col-sm-6 no-padding no-margin">--}}
        {{--@if ($schedule->type == 'D')--}}
            {{--@include('schedule.partials.day')--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
        {{--@if ($schedule->type == 'N')--}}
            {{--@include('schedule.partials.night')--}}
        {{--@endif--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="col-lg-12 col-sm-12 no-padding no-margin">--}}
    {{--@if ($schedule->type == '_')--}}
        {{--@include('schedule.partials.dayoff')--}}
    {{--@endif--}}
{{--</div>--}}