<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Team
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property integer $station_id
 * @property integer $team_type_id
 * @property integer $employee_type_id
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereTeamTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereEmployeeTypeId($value)
 * @property-read \App\TeamType $teamType
 * @property-read \App\EmployeeType $employeeType
 * @property-read \App\TeamType $team_type
 * @property-read \App\EmployeeType $employee_type
 */
class Team extends Model
{
    public $timestamps = false;

    public function team_type() {
        return $this->belongsTo('App\TeamType');
    }

    public function employee_type() {
        return $this->belongsTo('App\EmployeeType');
    }
}
