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
}
