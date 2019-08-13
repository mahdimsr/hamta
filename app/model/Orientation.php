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



	public function gradeLessons()
	{
		return $this->hasMany(GradeLesson::class,'id');
    }
}
