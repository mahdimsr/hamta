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
 * @property int $topicId
 */
class TopicLessonExam extends Model
{
    use SoftDeletes;

    protected $table = 'topic_lesson_exam';



	public function topic()
	{
		return $this->belongsTo(Topic::class,'topicId');
    }
}
