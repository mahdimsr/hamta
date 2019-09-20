<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property \Carbon\Carbon $deleted_at
 */
class Cart extends Model
{
	use SoftDeletes;

	protected $table = 'cart';



	protected static function boot()
	{
		parent::boot();

		self::creating(function($model)
		{
			$char = substr(md5(uniqid(rand(), true)), 0, 4);
			$track = 'TRK-' . $char;

			while (self::where('trk', $track)->exists())
			{
				$char = substr(md5(uniqid(rand(), true)), 0, 4);
				$track = 'TRK-' . $char;
			}

			$model->trk = $track;

		});
	}



	public function cartExams()
	{
		return $this->hasMany(CartExam::class, 'cartId');
	}
}
