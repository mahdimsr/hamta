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

    public function city()
    {
        return $this->hasOne(City::class,'id','cityId');
    }

    public function orientation()
    {
        return $this->hasOne(Orientation::class,'id','orientationId');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class,'id','gradeId');
    }

    public function scholarship()
    {
        return $this->hasOne(Scholarship::class,'studentId','id');
    }
}

