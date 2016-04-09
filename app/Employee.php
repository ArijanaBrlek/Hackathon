<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $OIB
 * @property string $gender
 * @property string $address
 * @property string $city
 * @property integer $station_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $phone
 * @property string $mobile
 * @property string $remark
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereOIB($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereRemark($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Employee whereUserId($value)
 */
class Employee extends Model
{
    //
}
