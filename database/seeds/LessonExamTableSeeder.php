<?php

    use Illuminate\Database\Seeder;
    use App\model\LessonExam;
    use App\model\ExamGradeLesson;
    use App\model\TopicExam;


    class LessonExamTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            //id 1
            $lessonExam              = new LessonExam();
            $lessonExam->itemType    = 'LESSON';
            $lessonExam->title       = 'آزمون اول';
            $lessonExam->price       = '20000';
            $lessonExam->description = 'این آزمون به طور پیش فرض درج شده است.';
            $lessonExam->save();

            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = $lessonExam->id;
            $examGradeLesson->gradeLessonId = 13;
            $examGradeLesson->save();


            $examGradeLesson                = new ExamGradeLesson();
            $examGradeLesson->examId        = $lessonExam->id;
            $examGradeLesson->gradeLessonId = 14;
            $examGradeLesson->save();


            //id 2
            $lessonExam              = new LessonExam();
            $lessonExam->itemType    = 'TOPIC';
            $lessonExam->title       = 'آزمون دوم';
            $lessonExam->price       = '20000';
            $lessonExam->description = 'این آزمون به طور پیش فرض درج شده است.';
            $lessonExam->save();

            $topicExam                     = new TopicExam();
            $topicExam->lessonExamId       = $lessonExam->id;
            $topicExam->topicGradeLessonId = 1;
            $topicExam->save();

            $topicExam                     = new TopicExam();
            $topicExam->lessonExamId       = $lessonExam->id;
            $topicExam->topicGradeLessonId = 2;
            $topicExam->save();

            $topicExam                     = new TopicExam();
            $topicExam->lessonExamId       = $lessonExam->id;
            $topicExam->topicGradeLessonId = 3;
            $topicExam->save();

        }
    }
