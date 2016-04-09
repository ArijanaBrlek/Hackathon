<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ShiftType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Query\Builder|\App\ShiftType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ShiftType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ShiftType whereCode($value)
 */
class ShiftType extends Model
{
    public $timestamps = false;
}
