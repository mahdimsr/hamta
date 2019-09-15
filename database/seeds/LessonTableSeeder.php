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
		//id 1
		$lesson              = new Lesson();
		$lesson->parentId    = 0;
		$lesson->code        = '201';
		$lesson->title       = 'زبان و ادبیات فارسی';
		$lesson->description = 'عمومی';
		$lesson->url         = 'Persian-Language-and-Literature';
		$lesson->save();

		//id 2
		$lesson              = new Lesson();
		$lesson->parentId    = 0;
		$lesson->code        = '206';
		$lesson->title       = 'عربی';
		$lesson->description = 'عمومی غیر انسانی';
		$lesson->url         = 'Arabic-no-Literature-and-Humanities';
		$lesson->save();

		//id 3
		$lesson              = new Lesson();
		$lesson->parentId    = 0;
		$lesson->code        = '207';
		$lesson->title       = 'عربی';
		$lesson->description = 'عمومی انسانی';
		$lesson->url         = 'Arabic-Literature-and-Humanities';
		$lesson->save();

		//id 4
		$lesson              = new Lesson();
		$lesson->parentId    = 0;
		$lesson->code        = '204';
		$lesson->title       = 'فرهنگ و معارف اسلامی';
		$lesson->description = 'عمومی غیر انسانی';
		$lesson->url         = 'Islamic-culture-and-education-no-Literature-and-Humanities';
		$lesson->save();

		//id 5
		$lesson              = new Lesson();
		$lesson->parentId    = 0;
		$lesson->code        = '205';
		$lesson->title       = 'فرهنگ و معارف اسلامی';
		$lesson->description = 'عمومی انسانی';
		$lesson->url         = 'Islamic-culture-and-education-Literature-and-Humanities';
		$lesson->save();

		//id 6
		$lesson              = new Lesson();
		$lesson->parentId    = 0;
		$lesson->code        = '230';
		$lesson->title       = 'زبان انگلیسی';
		$lesson->description = 'عمومی';
		$lesson->url         = 'English-language';
		$lesson->save();

		//id 7
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '211';
		$lesson->title    = 'ریاضیات';
		$lesson->url      = 'Mathematics';
		$lesson->save();

		//id 8
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '209';
		$lesson->title    = 'فیزیک';
		$lesson->url      = 'Physics';
		$lesson->save();


		//id 9
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '210';
		$lesson->title    = 'شیمی';
		$lesson->url      = 'chemistry';
		$lesson->save();


		//id 10
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '216';
		$lesson->title    = 'زیست شناسی';
		$lesson->url      = 'biology';
		$lesson->save();


		//id 11
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '219';
		$lesson->title    = 'تاریخ';
		$lesson->url      = 'history';
		$lesson->save();


		//id 12
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '218';
		$lesson->title    = 'جغرافیا';
		$lesson->url      = 'Geography';
		$lesson->save();


		//id 13
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '222';
		$lesson->title    = 'علوم اجتماعی';
		$lesson->url      = 'social-Sciences';
		$lesson->save();


		//id 14
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->code     = '226';
		$lesson->title    = 'فلسفه';
		$lesson->url      = 'Philosophy';
		$lesson->save();


		/*children*/

		//id 15
		$lesson           = new Lesson();
		$lesson->parentId = 1;
		$lesson->title    = 'فارسی (1)';
		$lesson->code     = '201';
		$lesson->url      = 'Farsi-one';
		$lesson->save();


		//id 16
		$lesson           = new Lesson();
		$lesson->parentId = 1;
		$lesson->title    = 'فارسی (2)';
		$lesson->code     = '201';
		$lesson->url      = 'Farsi-two';
		$lesson->save();


		//id 17
		$lesson           = new Lesson();
		$lesson->parentId = 1;
		$lesson->title    = 'فارسی (3)';
		$lesson->code     = '201';
		$lesson->url      = 'Farsi-three';
		$lesson->save();


		//id 18
		$lesson           = new Lesson();
		$lesson->parentId = 2;
		$lesson->title    = 'عربی، زبان قرآن (1)';
		$lesson->code     = '206';
		$lesson->url      = 'Arabic-one';
		$lesson->save();


		//id 19
		$lesson           = new Lesson();
		$lesson->parentId = 2;
		$lesson->title    = 'عربی، زبان قرآن (2)';
		$lesson->code     = '206';
		$lesson->url      = 'Arabic-two';
		$lesson->save();


		//id 20
		$lesson           = new Lesson();
		$lesson->parentId = 2;
		$lesson->title    = 'عربی، زبان قرآن (3)';
		$lesson->code     = '206';
		$lesson->url      = 'Arabic-three';
		$lesson->save();


		//id 21
		$lesson           = new Lesson();
		$lesson->parentId = 3;
		$lesson->title    = 'عربی، زبان قرآن (1)';
		$lesson->code     = '207';
		$lesson->url      = 'Arabic-one';
		$lesson->save();


		//id 22
		$lesson           = new Lesson();
		$lesson->parentId = 3;
		$lesson->title    = 'عربی، زبان قرآن (2)';
		$lesson->code     = '207';
		$lesson->url      = 'Arabic-two';
		$lesson->save();


		//id 23
		$lesson           = new Lesson();
		$lesson->parentId = 3;
		$lesson->title    = 'عربی، زبان قرآن (3)';
		$lesson->code     = '207';
		$lesson->url      = 'Arabic-three';
		$lesson->save();


		//id 24
		$lesson           = new Lesson();
		$lesson->parentId = 4;
		$lesson->title    = 'دین و زندگی (1)';
		$lesson->code     = '204';
		$lesson->url      = 'Islamic-one';
		$lesson->save();


		//id 25
		$lesson           = new Lesson();
		$lesson->parentId = 4;
		$lesson->title    = 'دین و زندگی (2)';
		$lesson->code     = '204';
		$lesson->url      = 'Islamic-two';
		$lesson->save();


		//id 26
		$lesson           = new Lesson();
		$lesson->parentId = 4;
		$lesson->title    = 'دین و زندگی (3)';
		$lesson->code     = '204';
		$lesson->url      = 'Islamic-three';
		$lesson->save();


		//id 27
		$lesson           = new Lesson();
		$lesson->parentId = 5;
		$lesson->title    = 'دین و زندگی (1)';
		$lesson->code     = '205';
		$lesson->url      = 'Islamic-one';
		$lesson->save();


		//id 28
		$lesson           = new Lesson();
		$lesson->parentId = 5;
		$lesson->title    = 'دین و زندگی (2)';
		$lesson->code     = '205';
		$lesson->url      = 'Islamic-two';
		$lesson->save();


		//id 29
		$lesson           = new Lesson();
		$lesson->parentId = 5;
		$lesson->title    = 'دین و زندگی (3)';
		$lesson->code     = '205';
		$lesson->url      = 'Islamic-three';
		$lesson->save();


		//id 30
		$lesson           = new Lesson();
		$lesson->parentId = 6;
		$lesson->title    = 'انگلیسی (1)';
		$lesson->code     = '230';
		$lesson->url      = 'English-one';
		$lesson->save();


		//id 31
		$lesson           = new Lesson();
		$lesson->parentId = 6;
		$lesson->title    = 'انگلیسی (2)';
		$lesson->code     = '230';
		$lesson->url      = 'English-two';
		$lesson->save();


		//id 32
		$lesson           = new Lesson();
		$lesson->parentId = 6;
		$lesson->title    = 'انگلیسی (3)';
		$lesson->code     = '230';
		$lesson->url      = 'English-three';
		$lesson->save();

		/*Experts*/

		/*Math and Physics*/

		//id 33
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضی (1)';
		$lesson->code     = '211';
		$lesson->url      = 'Math-one';
		$lesson->save();


		//id 34
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'هندسه (1)';
		$lesson->code     = '213';
		$lesson->url      = 'Geometry-one';
		$lesson->save();


		//id 35
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'هندسه (2)';
		$lesson->code     = '213';
		$lesson->url      = 'Geometry-two';
		$lesson->save();


		//id 36
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'آمار و احتمال';
		$lesson->code     = '215';
		$lesson->url      = 'Statistics-and-Probability';
		$lesson->save();


		//id 37
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'حسابان (1)';
		$lesson->code     = '214';
		$lesson->url      = 'Accountants-one';
		$lesson->save();


		//id 38
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'حسابان (2)';
		$lesson->code     = '214';
		$lesson->url      = 'Accountants-two';
		$lesson->save();


		//id 39
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'هندسه (3)';
		$lesson->code     = '213';
		$lesson->url      = 'Geometry-three';
		$lesson->save();


		//id 40
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضیات گسسته';
		$lesson->code     = '215';
		$lesson->url      = 'Discrete-Mathematics';
		$lesson->save();


		//id 41
		$lesson           = new Lesson();
		$lesson->parentId = 8;
		$lesson->title    = 'فیزیک (1)';
		$lesson->code     = '209';
		$lesson->url      = 'Physics-one';
		$lesson->save();


		//id 42
		$lesson           = new Lesson();
		$lesson->parentId = 8;
		$lesson->title    = 'فیزیک (2)';
		$lesson->code     = '209';
		$lesson->url      = 'Physics-two';
		$lesson->save();


		//id 43
		$lesson           = new Lesson();
		$lesson->parentId = 8;
		$lesson->title    = 'فیزیک (3)';
		$lesson->code     = '209';
		$lesson->url      = 'Physics-three';
		$lesson->save();


		//id 44
		$lesson           = new Lesson();
		$lesson->parentId = 9;
		$lesson->title    = 'شیمی (1)';
		$lesson->code     = '210';
		$lesson->url      = 'Chemistry-one';
		$lesson->save();


		//id 45
		$lesson           = new Lesson();
		$lesson->parentId = 9;
		$lesson->title    = 'شیمی (2)';
		$lesson->code     = '210';
		$lesson->url      = 'Chemistry-two';
		$lesson->save();


		//id 46
		$lesson           = new Lesson();
		$lesson->parentId = 9;
		$lesson->title    = 'شیمی (3)';
		$lesson->code     = '210';
		$lesson->url      = 'Chemistry-three';
		$lesson->save();


		//id 47
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->title    = 'زمین شناسی';
		$lesson->code     = '237';
		$lesson->url      = 'Geology';
		$lesson->save();


		//id 48
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضی (2)';
		$lesson->code     = '211';
		$lesson->url      = 'math-two';
		$lesson->save();


		//id 49
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضی (3)';
		$lesson->code     = '211';
		$lesson->url      = 'math-three';
		$lesson->save();


		//id 50
		$lesson           = new Lesson();
		$lesson->parentId = 10;
		$lesson->title    = 'زیست­ شناسی (1)';
		$lesson->code     = '216';
		$lesson->url      = 'Biology-one';
		$lesson->save();


		//id 51
		$lesson           = new Lesson();
		$lesson->parentId = 10;
		$lesson->title    = 'زیست­ شناسی (2)';
		$lesson->code     = '216';
		$lesson->url      = 'Biology-two';
		$lesson->save();


		//id 52
		$lesson           = new Lesson();
		$lesson->parentId = 10;
		$lesson->title    = 'زیست­ شناسی (3)';
		$lesson->code     = '216';
		$lesson->url      = 'Biology-three';
		$lesson->save();


		//id 53
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضی و آمار (1)';
		$lesson->code     = '212';
		$lesson->url      = 'Mathematics-and-Statistics-one';
		$lesson->save();


		//id 54
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضی و آمار (2)';
		$lesson->code     = '212';
		$lesson->url      = 'Mathematics-and-Statistics-two';
		$lesson->save();


		//id 55
		$lesson           = new Lesson();
		$lesson->parentId = 7;
		$lesson->title    = 'ریاضی و آمار (3)';
		$lesson->code     = '212';
		$lesson->url      = 'Mathematics-and-Statistics-three';
		$lesson->save();


		//id 56
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->title    = 'اقتصاد';
		$lesson->code     = '221';
		$lesson->url      = 'Economy';
		$lesson->save();


		//id 57
		$lesson           = new Lesson();
		$lesson->parentId = 1;
		$lesson->title    = 'علوم و فنون ادبی (1)';
		$lesson->code     = '203';
		$lesson->url      = 'Literary-Techniques-one';
		$lesson->save();


		//id 58
		$lesson           = new Lesson();
		$lesson->parentId = 1;
		$lesson->title    = 'علوم و فنون ادبی (2)';
		$lesson->code     = '203';
		$lesson->url      = 'Literary-Techniques-two';
		$lesson->save();


		//id 59
		$lesson           = new Lesson();
		$lesson->parentId = 1;
		$lesson->title    = 'علوم و فنون ادبی (3)';
		$lesson->code     = '203';
		$lesson->url      = 'Literary-Techniques-three';
		$lesson->save();


		//id 60
		$lesson           = new Lesson();
		$lesson->parentId = 11;
		$lesson->title    = 'تاریخ (1)';
		$lesson->code     = '219';
		$lesson->url      = 'History-one';
		$lesson->save();


		//id 61
		$lesson           = new Lesson();
		$lesson->parentId = 11;
		$lesson->title    = 'تاریخ (2)';
		$lesson->code     = '219';
		$lesson->url      = 'History-two';
		$lesson->save();


		//id 62
		$lesson           = new Lesson();
		$lesson->parentId = 11;
		$lesson->title    = 'تاریخ (3)';
		$lesson->code     = '219';
		$lesson->url      = 'History-three';
		$lesson->save();


		//id 63
		$lesson           = new Lesson();
		$lesson->parentId = 12;
		$lesson->title    = 'جغرافیای ایران';
		$lesson->code     = '218';
		$lesson->url      = 'Geography-iran';
		$lesson->save();


		//id 64
		$lesson           = new Lesson();
		$lesson->parentId = 12;
		$lesson->title    = 'جغرافیای (2)';
		$lesson->code     = '218';
		$lesson->url      = 'Geography-two';
		$lesson->save();


		//id 65
		$lesson           = new Lesson();
		$lesson->parentId = 12;
		$lesson->title    = 'جغرافیا (3) (کاربردی)';
		$lesson->code     = '218';
		$lesson->url      = 'Geography-three';
		$lesson->save();


		//id 66
		$lesson           = new Lesson();
		$lesson->parentId = 13;
		$lesson->title    = 'جامعه­ شناسی (1)';
		$lesson->code     = '220';
		$lesson->url      = 'social-Sciences-one';
		$lesson->save();


		//id 67
		$lesson           = new Lesson();
		$lesson->parentId = 13;
		$lesson->title    = 'جامعه­ شناسی (2)';
		$lesson->code     = '222';
		$lesson->url      = 'social-Sciences-two';
		$lesson->save();


		//id 68
		$lesson           = new Lesson();
		$lesson->parentId = 13;
		$lesson->title    = 'جامعه­ شناسی (3)';
		$lesson->code     = '222';
		$lesson->url      = 'social-Sciences-three';
		$lesson->save();


		//id 69
		$lesson           = new Lesson();
		$lesson->parentId = 14;
		$lesson->title    = 'فلسفه';
		$lesson->code     = '226';
		$lesson->url      = 'Philosophy-one';
		$lesson->save();


		//id 70
		$lesson           = new Lesson();
		$lesson->parentId = 14;
		$lesson->title    = 'فلسفه (آشنایی با فلسفه اسلامی)';
		$lesson->code     = '226';
		$lesson->url      = 'Philosophy-two';
		$lesson->save();


		//id 71
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->title    = 'منطق';
		$lesson->code     = '223';
		$lesson->url      = 'Logic';
		$lesson->save();


		//id 72
		$lesson           = new Lesson();
		$lesson->parentId = 0;
		$lesson->title    = 'روان­شناسی';
		$lesson->code     = '224';
		$lesson->url      = 'Psychology';
		$lesson->save();




	}
}
