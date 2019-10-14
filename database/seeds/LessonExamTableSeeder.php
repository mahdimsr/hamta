<?php

    use Illuminate\Database\Seeder;
    use App\model\LessonExam;
    use App\model\QuestionExam;
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

            // lesson_exam => id 1
            $lessonExam              = new LessonExam();
            $lessonExam->title       = 'آزمون پیش فرض سامانه';
            $lessonExam->description = 'علی جان هرکی دوست داری سیدر رو پاک نکن';
            $lessonExam->price       = 50000;
            $lessonExam->activeDate  = Carbon::yesterday();
            $lessonExam->duration    = 30;
            $lessonExam->save();

            // exam_grade_lesson => id 1
            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = 1;
            $examGradeLesson->gradeLessonId = 21;
            $examGradeLesson->type          = 'LESSON_EXAM';
            $examGradeLesson->save();

            // exam_grade_lesson => id 2
            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = 1;
            $examGradeLesson->gradeLessonId = 7;
            $examGradeLesson->type          = 'LESSON_EXAM';
            $examGradeLesson->save();

            // question_exam => id 1
            $questionExam             = new QuestionExam();
            $questionExam->examId     = 1;
            $questionExam->questionId = 1;
            $questionExam->type       = 'LESSON_EXAM';
            $questionExam->save();

            // question_exam => id 2
            $questionExam             = new QuestionExam();
            $questionExam->examId     = 1;
            $questionExam->questionId = 2;
            $questionExam->type       = 'LESSON_EXAM';
            $questionExam->save();


        }

    }
