<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PreferencesEmployeeType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $employee_id
 * @property integer $employee_type_id
 * @method static \Illuminate\Database\Query\Builder|\App\PreferencesEmployeeType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PreferencesEmployeeType whereEmployeeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PreferencesEmployeeType whereEmployeeTypeId($value)
 */
class PreferencesEmployeeType extends Model
{
    public $timestamps = false;
}
