<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    /**
     * @property \Carbon\Carbon $created_at
     * @property int            $id
     * @property int            $examId
     * @property int            $gradeLessonId
     * @property \Carbon\Carbon $updated_at
     * @property \Carbon\Carbon $deleted_at
     */
    class ExamGradeLesson extends Model
    {

        use SoftDeletes;

        protected $table = 'exam_grade_lesson';


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $lessonExam  = LessonExam::query()->find($model->examId);

                $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                $code = 'EXML-' . $str1 . $lessonExam->id . $str2;

                while (LessonExam::query()->where('exm', $code)->exists())
                {
                    $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $code = 'EXML-' . $str1 . $lessonExam->id . $str2;
                }

                $lessonExam->exm = $code;

                $lessonExam->update();


            });
        }


        public function lessonExam()
        {

            return $this->belongsTo(LessonExam::class, 'examId');
        }


        public function gradeLesson()
        {

            return $this->belongsTo(GradeLesson::class, 'gradeLessonId');
        }


    }
