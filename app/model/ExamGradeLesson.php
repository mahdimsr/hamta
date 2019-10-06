<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    /**
     * @property \Carbon\Carbon $created_at
     * @property int            $id
     * @property int            $examId
     * @property int            $gradeLessonId
     * @property string         $type
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

                if ($model->type == 'LESSON_EXAM')
                {
                    $lessonExam = LessonExam::query()->find($model->examId);

                    $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $code = 'EXML-' . $str1 . $lessonExam->id . $str2;

                    $code = 'EXM-' . $str1 . $lessonExam->id . $str2;

                    while (LessonExam::query()->where('exm', $code)->exists())
                    {
                        $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                        $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                        $code = 'EXM-' . $str1 . $lessonExam->id . $str2;
                    }

                    $lessonExam->exm = $code;

                    $lessonExam->update();

                }
                elseif ($model->type == 'GIFT_EXAM')
                {
                    $giftExam = GiftExam::query()->find($model->examId);

                    $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $code = 'EXM-' . $str1 . $giftExam->id . $str2;

                    while (GiftExam::query()->where('exm', $code)->exists())
                    {
                        $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                        $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                        $code = 'EXM-' . $str1 . $giftExam->id . $str2;
                    }

                    $giftExam->exm = $code;

                    $giftExam->update();
                }


            });
        }


        public function lessonExam()
        {

            return $this->belongsTo(LessonExam::class, 'examId')->where('type', '=', 'LESSON_EXAM');
        }


        public function gradeLesson()
        {

            return $this->belongsTo(GradeLesson::class, 'gradeLessonId');
        }


    }
