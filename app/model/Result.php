<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property \Carbon\Carbon $deleted_at
 */
class Result extends Model
{
    use SoftDeletes;

    protected $table = 'result';
    protected $appends = ['persianCreatedAt'];

    public function getPersianCreatedAtAttribute()
    {
        $date = Jalalian::fromCarbon($this->created_at)->format('%A, %d %B %y');
        return $date;
    }

    public function lessonExam()
    {
        return $this->belongsTo(LessonExam::class, 'examId');
    }

    public function giftExam()
    {
        return $this->belongsTo(GiftExam::class, 'examId');
    }

}
