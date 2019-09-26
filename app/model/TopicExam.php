<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property int $id
 * @property int $lessonExamId
 * @property int $topicGradeLessonId
 */
class TopicExam extends Model
{
    use SoftDeletes;

    protected $table = 'topic_exam';



	public function lessonExam()
	{
		return $this->belongsTo(LessonExam::class,'lessonExamId');
    }



	public function topicGradeLesson()
	{
		return $this->belongsTo(TopicGradeLesson::class,'topicGradeLessonId');
    }
}
