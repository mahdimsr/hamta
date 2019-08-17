<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property int $studentId
 * @property int $adminId
 * @property string $status
 * @property string $stdMessage
 * @property string $adminMessage
 * @property \Carbon\Carbon $deleted_at
 */

class Scholarship extends Model
{
    //
    use SoftDeletes;
    protected $table='scholarship';

}
