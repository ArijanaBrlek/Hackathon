<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TeamType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Query\Builder|\App\TeamType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TeamType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TeamType whereCode($value)
 */
class TeamType extends Model
{
    public $timestamps = false;
}
