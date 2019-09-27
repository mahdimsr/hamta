<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property int $id
 * @property int $categoryId
 * @property string $title
 */
class QuestionType extends Model
{
	use SoftDeletes;

    protected $table = 'question_type';



	public function category()
	{
		return $this->belongsTo(Category::class,'categoryId');
    }



	public function questions()
	{
		return $this->hasMany(Question::class,'questionTypeId');
    }
}
