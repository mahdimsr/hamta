<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property int $parentId
 * @property string $fullName
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Admin extends Authenticatable
{
	use SoftDeletes;

	protected $guarded = 'admin';

	protected $table = 'admin';



	public function parent()
	{
		return $this->belongsTo(Admin::class, 'id', 'parentId');
	}



	public function children()
	{
		return $this->hasMany(Admin::class, 'parentId', 'id');
	}
}
