<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Station
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Station whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Station whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Station whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Team[] $teams
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Employee[] $employees
 * @property string $address
 * @method static \Illuminate\Database\Query\Builder|\App\Station whereAddress($value)
 */
class Station extends Model
{
    protected $fillable = ['name'];

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
