<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property string $code
 * @property string $title
 * @property string $url
 * @property \Carbon\Carbon $deleted_at
 */
class Lesson extends Model
{
	use SoftDeletes;

	protected $table = 'lesson';



	protected static function boot()
	{
		parent::boot();

		self::deleting(function($model)
		{
			$model->gradeLessons()->delete();
		});

		self::updating(function($model)
		{

			foreach ($model->gradeLessons as $gradeLesson)
			{
				//$goCode is abbreviation of grade orientation code

				$goCode = substr($gradeLesson->code, 2, 4);


				$gradeLesson->code = $model->code . $goCode;
				$gradeLesson->update();
			}



		});
	}



	public function gradeLessons()
	{
		return $this->hasMany(GradeLesson::class, 'lessonId');
	}
}
