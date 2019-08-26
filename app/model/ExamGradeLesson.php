<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property int $examId
 * @property int $gradeLessonId
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class ExamGradeLesson extends Model
{
    use SoftDeletes;

    protected $table = 'exam_grade_lesson';



	public function lessonExam()
	{
		return $this->belongsTo('app\model\LessonExam','examId');
    }



	public function gradeLesson()
	{
		return $this->belongsTo('app\model\GradeLesson','gradeLessonId');
    }
}
