<?php

    use Illuminate\Database\Seeder;
    use App\model\LessonExam;
    use App\model\ExamGradeLesson;
    use Carbon\Carbon;


    class LessonExamTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            $lessonExam              = new LessonExam();
            $lessonExam->title       = 'آزمون پیش فرض سیستم';
            $lessonExam->price       = 1000;
            $lessonExam->activeDate  = Carbon::now();
            $lessonExam->duration    = 20;
            $lessonExam->description = 'این آزمون به صورت پیش فرض در سیستم وجود دارد.';
            $lessonExam->save();

            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = $lessonExam->id;
            $examGradeLesson->gradeLessonId = 13;
            $examGradeLesson->type          = 'LESSON_EXAM';
            $examGradeLesson->save();

            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = $lessonExam->id;
            $examGradeLesson->gradeLessonId = 14;
            $examGradeLesson->type          = 'LESSON_EXAM';
            $examGradeLesson->save();

            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = $lessonExam->id;
            $examGradeLesson->gradeLessonId = 16;
            $examGradeLesson->type          = 'LESSON_EXAM';
            $examGradeLesson->save();

        }

    }
