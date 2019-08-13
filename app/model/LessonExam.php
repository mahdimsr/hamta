<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property string $exm
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $answerSheet
 * @property \Carbon\Carbon $deleted_at
 */
class LessonExam extends Model
{
	use SoftDeletes;

	protected $table = 'lesson_exam';

	protected $appends = ['answerSheetPath'];



	public function getAnswerSheetPathAttribute()
	{
		$path = Storage::disk('lessonExam')->url($this->exm . '/' . $this->answerSheet);

		return $path;
	}

}
