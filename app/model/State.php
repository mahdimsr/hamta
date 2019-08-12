<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class State extends Model
{
    //
    protected $table = 'state';
    public function city()
    {
        return $this->hasMany('App\model\City','stateid','id');
    }
}
