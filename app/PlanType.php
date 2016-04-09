<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PlanType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Query\Builder|\App\PlanType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PlanType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PlanType whereCode($value)
 */
class PlanType extends Model
{
    public $timestamps = false;
}
