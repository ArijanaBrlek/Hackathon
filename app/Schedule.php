<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Schedule
 *
 * @property integer $id
 * @property integer $year
 * @property integer $week
 * @property integer $day
 * @property integer $employee_id
 * @property integer $station_id
 * @property string $type
 * @property integer $employee_task_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Employee $employee
 * @property-read \App\Station $station
 * @property-read \App\EmployeeType $employee_task
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereWeek($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereDay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereEmployeeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereEmployeeTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Schedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    protected $fillable = array('year', 'week', 'day', 'employee_id', 'station_id', 'type', 'employee_task_id', 'team_type_id');

    public function employee() {
        return $this->belongsTo('App\Employee');
    }

    public function station() {
        return $this->belongsTo('App\Station');
    }

    public function employee_task() {
        return $this->belongsTo('App\EmployeeType');
    }
}
