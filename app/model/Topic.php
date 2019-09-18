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
 * @property string $headLine
 * @property string $title
 */
class Topic extends Model
{
	use SoftDeletes;

	protected $table = 'topic';



	public function gradeLesson()
	{
		return $this->belongsTo(GradeLesson::class, 'gradeLessonId');
	}



	public function topicLessonExams()
	{
		return $this->hasMany(TopicLessonExam::class, 'topicId');
	}
}
