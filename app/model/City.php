<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    //
    protected $table = 'city';

    public function province()
    {
        return $this->hasOne('App\model\Province','id','provinceId');
    }

    public function students()
    {
        return $this->hasMany('App\model\Student','cityId','id');
    }

}
