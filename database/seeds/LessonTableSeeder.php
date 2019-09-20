<?php

use Illuminate\Database\Seeder;
use App\model\Lesson;


class LessonTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{


		$lesson           = new Lesson();
		$lesson->title    = 'فارسی (1)';
		$lesson->code     = '201';
		$lesson->url      = 'Farsi-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فارسی (2)';
		$lesson->code     = '201';
		$lesson->url      = 'Farsi-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فارسی (3)';
		$lesson->code     = '201';
		$lesson->url      = 'Farsi-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'عربی، زبان قرآن (1)';
		$lesson->code     = '206';
		$lesson->url      = 'Arabic-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'عربی، زبان قرآن (2)';
		$lesson->code     = '206';
		$lesson->url      = 'Arabic-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'عربی، زبان قرآن (3)';
		$lesson->code     = '206';
		$lesson->url      = 'Arabic-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'دین و زندگی (1)';
		$lesson->code     = '204';
		$lesson->url      = 'Islamic-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'دین و زندگی (2)';
		$lesson->code     = '204';
		$lesson->url      = 'Islamic-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'دین و زندگی (3)';
		$lesson->code     = '204';
		$lesson->url      = 'Islamic-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'انگلیسی (1)';
		$lesson->code     = '230';
		$lesson->url      = 'English-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'انگلیسی (2)';
		$lesson->code     = '230';
		$lesson->url      = 'English-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'انگلیسی (3)';
		$lesson->code     = '230';
		$lesson->url      = 'English-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'ریاضی (1)';
		$lesson->code     = '211';
		$lesson->url      = 'Math-one';
        $lesson->save();

		$lesson           = new Lesson();
		$lesson->title    = 'ریاضی (2)';
		$lesson->code     = '211';
		$lesson->url      = 'Math-two';
		$lesson->save();

        $lesson           = new Lesson();
		$lesson->title    = 'ریاضی (3)';
		$lesson->code     = '211';
		$lesson->url      = 'Math-three';
        $lesson->save();

		$lesson           = new Lesson();
		$lesson->title    = 'هندسه (1)';
		$lesson->code     = '213';
		$lesson->url      = 'Geometry-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'هندسه (2)';
		$lesson->code     = '213';
		$lesson->url      = 'Geometry-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'آمار و احتمال';
		$lesson->code     = '215';
		$lesson->url      = 'Statistics-and-Probability';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'حسابان (1)';
		$lesson->code     = '214';
		$lesson->url      = 'Accountants-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'حسابان (2)';
		$lesson->code     = '214';
		$lesson->url      = 'Accountants-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'هندسه (3)';
		$lesson->code     = '213';
		$lesson->url      = 'Geometry-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'ریاضیات گسسته';
		$lesson->code     = '215';
		$lesson->url      = 'Discrete-Mathematics';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فیزیک (1)';
		$lesson->code     = '209';
		$lesson->url      = 'Physics-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فیزیک (2)';
		$lesson->code     = '209';
		$lesson->url      = 'Physics-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فیزیک (3)';
		$lesson->code     = '209';
		$lesson->url      = 'Physics-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'شیمی (1)';
		$lesson->code     = '210';
		$lesson->url      = 'Chemistry-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'شیمی (2)';
		$lesson->code     = '210';
		$lesson->url      = 'Chemistry-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'شیمی (3)';
		$lesson->code     = '210';
		$lesson->url      = 'Chemistry-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'زمین شناسی';
		$lesson->code     = '237';
		$lesson->url      = 'Geology';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'زیست­ شناسی (1)';
		$lesson->code     = '216';
		$lesson->url      = 'Biology-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'زیست­ شناسی (2)';
		$lesson->code     = '216';
		$lesson->url      = 'Biology-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'زیست­ شناسی (3)';
		$lesson->code     = '216';
		$lesson->url      = 'Biology-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'ریاضی و آمار (1)';
		$lesson->code     = '212';
		$lesson->url      = 'Mathematics-and-Statistics-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'ریاضی و آمار (2)';
		$lesson->code     = '212';
		$lesson->url      = 'Mathematics-and-Statistics-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'ریاضی و آمار (3)';
		$lesson->code     = '212';
		$lesson->url      = 'Mathematics-and-Statistics-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'اقتصاد';
		$lesson->code     = '221';
		$lesson->url      = 'Economy';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'علوم و فنون ادبی (1)';
		$lesson->code     = '203';
		$lesson->url      = 'Literary-Techniques-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'علوم و فنون ادبی (2)';
		$lesson->code     = '203';
		$lesson->url      = 'Literary-Techniques-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'علوم و فنون ادبی (3)';
		$lesson->code     = '203';
		$lesson->url      = 'Literary-Techniques-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'تاریخ (1)';
		$lesson->code     = '219';
		$lesson->url      = 'History-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'تاریخ (2)';
		$lesson->code     = '219';
		$lesson->url      = 'History-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'تاریخ (3)';
		$lesson->code     = '219';
		$lesson->url      = 'History-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'جغرافیای ایران';
		$lesson->code     = '218';
		$lesson->url      = 'Geography-iran';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'جغرافیای (2)';
		$lesson->code     = '218';
		$lesson->url      = 'Geography-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'جغرافیا (3) (کاربردی)';
		$lesson->code     = '218';
		$lesson->url      = 'Geography-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'جامعه­ شناسی (1)';
		$lesson->code     = '220';
		$lesson->url      = 'social-Sciences-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'جامعه­ شناسی (2)';
		$lesson->code     = '222';
		$lesson->url      = 'social-Sciences-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'جامعه­ شناسی (3)';
		$lesson->code     = '222';
		$lesson->url      = 'social-Sciences-three';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فلسفه';
		$lesson->code     = '226';
		$lesson->url      = 'Philosophy-one';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'فلسفه (آشنایی با فلسفه اسلامی)';
		$lesson->code     = '226';
		$lesson->url      = 'Philosophy-two';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'منطق';
		$lesson->code     = '223';
		$lesson->url      = 'Logic';
		$lesson->save();


		$lesson           = new Lesson();
		$lesson->title    = 'روان­شناسی';
		$lesson->code     = '224';
		$lesson->url      = 'Psychology';
		$lesson->save();


	}
}
