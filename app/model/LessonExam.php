<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property int $gradeLessonId
 * @property string $exm
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $answerSheet
 * @property string $status
 * @property boolean $isPublic
 * @property \Carbon\Carbon $deleted_at
 */
class LessonExam extends Model
{
	use SoftDeletes;

	protected $table = 'lesson_exam';

	protected $appends = ['answerSheetPath'];



	protected static function boot()
	{
		parent::boot();

		self::creating(function($model)
		{

			$gradeLesson = GradeLesson::query()->find($model->gradeLessonId);

			$model->exm = 'EXM-' . $gradeLesson->code;

		});
	}



	public function getAnswerSheetPathAttribute()
	{
		$path = Storage::disk('lessonExam')->url($this->exm . '/' . $this->answerSheet);

		return $path;
	}

}
