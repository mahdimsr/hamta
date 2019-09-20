<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class Province extends Model
{
    //
    protected $table = 'province';

    public function cities()
    {
        return $this->hasMany(City::class,'provinceId');
    }

}
