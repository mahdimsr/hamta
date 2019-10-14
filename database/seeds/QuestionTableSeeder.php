<?php

    use Illuminate\Database\Seeder;
    use App\model\Question;


    class QuestionTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            //id 1
            $question                = new Question();
            $question->text          = 'نماد گرانش زمین کدام گزینه است؟';
            $question->optionOne     = 'F';
            $question->optionTwo     = 'E';
            $question->optionThree   = 'G';
            $question->optionFour    = 'q';
            $question->answer        = 3;
            $question->gradeLessonId = 21;
            $question->hardness     = '1';
            $question->save();

            //id 2
            $question                = new Question();
            $question->text          = 'قرآن بر چه کسی نازل شد؟';
            $question->optionOne     = 'عباس';
            $question->optionTwo     = 'مختار';
            $question->optionThree   = 'صدام';
            $question->optionFour    = 'پیامبر';
            $question->answer        = 4;
            $question->gradeLessonId = 7;
            $question->hardness     = '3';
            $question->save();

        }

    }
