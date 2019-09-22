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



	/*
	protected static function boot()
	{
		parent::boot();

		self::creating(function($model)
		{
			$lesson = Lesson::query()->find($model->lessonId);
			$grade  = Grade::query()->find($model->gradeId);

			if ($model->orientationId == 1 || $model->orientationId == 2 || $model->orientationId == 3)
			{
				$orientation = Orientation::query()->find($model->orientationId);
				$model->code = $orientation->code . '-' . $grade->code . '-' . $lesson->code;
			}
			else
			{
				$model->code = $model->orientationId . '-' . $grade->code . '-' . $lesson->code;
			}

			// $model->save();

		});
	}
*/


	public function getTitleAttribute()
	{
		$lessonTitle = $this->lesson->title;
		$gradeTitle  = $this->grade->title;

		if ($this->orientationId == 1 || $this->orientationId == 2 || $this->orientationId == 3 && $this->type == 'EXPERT')
		{
			$orientationTitle = $this->orientation->title;
			return $lessonTitle . ' ' . $gradeTitle . '-' . $orientationTitle;
		}
		else
		{
			return $lessonTitle . ' ' . $gradeTitle . '-' . $this->lesson->parent->description;

		}
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



	public function questions()
	{
		return $this->hasMany(Question::class, 'gradeLessonId');
	}



	public function topics()
	{
		return $this->hasMany(Topic::class, 'gradeLessonId');
	}



	public function orientationCategory()
	{
		return $this->belongsTo(OrientationCategory::class, 'orientationCategoryId');
	}
}
