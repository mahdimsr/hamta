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
class Question extends Model
{
	use SoftDeletes;

	protected $table = 'question';

	protected $appends = ['hardnessLabel'];



	public function gradeLesson()
	{
		return $this->belongsTo(GradeLesson::class, 'gradeLessonId');
	}



	public function questionExams()
	{
		return $this->hasMany(QuestionExam::class,'questionId');
	}



	public function getHardnessLabelAttribute()
	{
		$hardnessArray = [
			'1' => 'خیلی ساده',
			'2' => 'ساده',
			'3' => 'معمولی',
			'4' => 'سخت',
			'5' => 'خیلی سخت',
		];

		return $hardnessArray[$this->hardness];
	}
}
