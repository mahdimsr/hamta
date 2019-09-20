<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    //
    protected $table = 'city';

    public function province()
    {
        return $this->hasOne(Province::class,'id','provinceId');
    }

    public function students()
    {
        return $this->hasMany(City::class,'cityId');
    }

}
