<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property int $id
 * @property int $gradeLessonId
 * @property int $topicId
 */
class TopicGradeLesson extends Model
{
	use SoftDeletes;

	protected $table = 'topic_grade_lesson';



	public function topic()
	{
		return $this->belongsTo(Topic::class, 'topicId');
	}



	public function gradeLesson()
	{
		return $this->belongsTo(GradeLesson::class, 'gradeLessonId');
	}



	public function questions()
	{
		return $this->hasMany(Question::class, 'topicGradeLessonId');
	}

}
