<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentCode extends Model
{
    use SoftDeletes;

    protected $table = 'student_code';

    public function discount()
    {
        return $this->belongsTo(Discount::class,'discountId');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'studentId');
    }

}
