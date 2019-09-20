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
class Orientation extends Model
{
	use SoftDeletes;

	protected $table = 'orientation';



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
				//$lgCode is abbreviation of lesson grade code

				$lgCode = substr($gradeLesson->code,0,4);

				$gradeLesson->code = $lgCode.$model->code;
				$gradeLesson->update();
			}
		});
	}




    public function orientations_category()
	{
		return $this->hasMany(OrientationCategory::class, 'orientationId');
    }

}
