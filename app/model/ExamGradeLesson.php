<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property int $examId
 * @property int $gradeLessonId
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class ExamGradeLesson extends Model
{
	use SoftDeletes;

	protected $table = 'exam_grade_lesson';



	protected static function boot()
	{
		parent::boot();

		self::creating(function($model)
		{

			$lessonExam  = LessonExam::query()->find($model->examId);
			$gradeLesson = GradeLesson::query()->find($model->gradeLessonId);

			$char = substr(md5(uniqid(rand(), true)), 0, 1);
			$code = 'EXM-' . $char . '-' . $gradeLesson->code;

			while (LessonExam::query()->where('exm', $code)->exists())
			{
				$char = substr(md5(uniqid(rand(), true)), 0, 1);
				$code = 'EXM-' . $char . '-' . $gradeLesson->code;
			}

			$lessonExam->exm = $code;

			$lessonExam->update();


		});
	}



	public function lessonExam()
	{
		return $this->belongsTo('app\model\LessonExam', 'examId');
	}



	public function gradeLesson()
	{
		return $this->belongsTo('app\model\GradeLesson', 'gradeLessonId');
	}
}
