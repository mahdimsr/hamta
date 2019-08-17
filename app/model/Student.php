<?php

namespace App\model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Student extends Authenticatable
{
	use SoftDeletes;

	protected $table = 'student';
    protected $fillable = ['mobile-email', 'password'];

    public function city()
    {
        return $this->hasOne('App\model\City','id','cityId');
    }

    public function orientation()
    {
        return $this->hasOne('App\model\Orientation','id','orientationId');
    }

    public function grade()
    {
        return $this->hasOne('App\model\Grade','id','gradeId');
    }

    public function scholarship()
    {
        return $this->hasOne('App\model\Scholarship','studentId','id');
    }
}

