<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
class State extends Model
{
    //
    protected $table = 'state';
    public function cities()
    {
        return $this->hasMany('App\model\City','stateid','id');
    }
}
