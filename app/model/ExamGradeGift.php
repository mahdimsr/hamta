<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;


    class ExamGradeGift extends Model
    {

        protected $table = 'exam_grade_gift';


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $giftExam  = GiftExam::query()->find($model->examId);

                $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                $code = 'EXMG-' . $str1 . $giftExam->id . $str2;

                while (GiftExam::query()->where('exm', $code)->exists())
                {
                    $str1 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $str2 = substr(md5(uniqid(mt_rand(), true)), 0, 2);
                    $code = 'EXMG-' . $str1 . $giftExam->id . $str2;
                }

                $giftExam->exm = $code;

                $giftExam->update();


            });
        }


        public function giftExam()
        {

            return $this->belongsTo(GiftExam::class, 'examId');
        }


        public function gradeLesson()
        {

            return $this->belongsTo(GradeLesson::class,'gradeLessonId');
        }

    }
