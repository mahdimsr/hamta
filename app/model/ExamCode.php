<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamCode extends Model
{
    use SoftDeletes;

    protected $table = 'exam_code';

    protected static function boot()
    {

        parent::boot();


        self::deleting(function($model)
        {

            $model->discount()->delete();

        });
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class,'discountId');
    }

}
