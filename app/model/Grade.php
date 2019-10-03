<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $url
 * @property \Carbon\Carbon $deleted_at
 */
class Grade extends Model
{
	use SoftDeletes;

	protected $table = 'grade';



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
				$lessonCode      = substr($gradeLesson->code, 0, 2);
				$orientationCode = substr($gradeLesson->code, 4, 2);

				$gradeLesson->code = $lessonCode.$model->code.$orientationCode;
				$gradeLesson->update();
			}
		});
	}



	public function gradeLessons()
	{
		return $this->hasMany(GradeLesson::class, 'gradeId');
	}


    public function gradeable()
    {

        return $this->morphTo();
	}
}
