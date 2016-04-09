<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\EmployeeType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Query\Builder|\App\EmployeeType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmployeeType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmployeeType whereCode($value)
 */
class EmployeeType extends Model
{
    public $timestamps = false;
}
