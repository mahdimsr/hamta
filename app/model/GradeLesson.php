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

	protected $appends = ['title'];



	protected static function boot()
	{
		parent::boot();

		self::creating(function($model)
		{
			$lesson      = Lesson::query()->find($model->lessonId);
			$grade       = Grade::query()->find($model->gradeId);
			$orientation = Orientation::query()->find($model->orientationId);

			$model->code = $lesson->code . $grade->code . $orientation->code;

			// $model->save();

		});
	}



	public function getTitleAttribute()
	{
		$lessonTitle      = $this->lesson->title;
		$gradeTitle       = $this->grade->title;
		$orientationTitle = $this->orientation->title;

		return $lessonTitle . ' ' . $gradeTitle.'-'.$orientationTitle;
	}



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



	public function lessonExam()
	{
		return $this->hasMany('app\model\ExamGradeLesson', 'gradeLessonId');
	}
}
