<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;


    class ExamGradeGift extends Model
    {

        protected $table = 'exam_grade_gift';


        public function giftExam()
        {

            return $this->belongsTo(GiftExam::class, 'examId');
        }


        public function gradeLesson()
        {

            return $this->belongsTo(GradeLesson::class,'gradeLessonId');
        }

    }
