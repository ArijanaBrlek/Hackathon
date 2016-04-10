<form>
    <div class="form-group">
        <div class="row">
            @include('plan.partials.available')
            @include('plan.partials.dayoff')
            @include('plan.partials.sick')
            @include('plan.partials.vacation')
        </div>
        {{--<select class="plan-type form-control" data-plan-id="{{ $plan->id }}" data-placeholder="Select plan type">--}}
            {{--@foreach($plan_types as $plan_type)--}}
                {{--<option value="{{ $plan_type->code }}" {{ $plan->plan_type->id == $plan_type->id ? 'selected' : '' }}>{{ $plan_type->name }}</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
    </div>
</form>