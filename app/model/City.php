<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    //
    protected $table = 'city';

    public function state()
    {
        return $this->hasOne('App\model\State','id','stateId');
    }

    public function students()
    {
        return $this->hasMany('App\model\Student','cityId','id');
    }

}
