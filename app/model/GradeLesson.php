<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property int $lessonId
 * @property int $gradeId
 * @property int $orientationId
 * @property string $code
 * @property int $ratio
 * @property string $type
 * @property \Carbon\Carbon $deleted_at
 */
class GradeLesson extends Model
{
	use SoftDeletes;

	protected $table = 'grade_lesson';



	public function orientation()
	{
		return $this->belongsTo(Orientation::class, 'orientationId');
	}



	public function grade()
	{
		return $this->belongsTo(Grade::class, 'gradeId');
	}



	public function lesson()
	{
		return $this->belongsTo(Lesson::class, 'lessonId');
	}


}
