<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PreferencesPlanType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $employee_id
 * @property integer $plan_type_id
 * @method static \Illuminate\Database\Query\Builder|\App\PreferencesPlanType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PreferencesPlanType whereEmployeeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PreferencesPlanType wherePlanTypeId($value)
 */
class PreferencesPlanType extends Model
{
    public $timestamps = false;

    public function plan_type() {
        return $this->belongsTo('App\PlanType');
    }
}
