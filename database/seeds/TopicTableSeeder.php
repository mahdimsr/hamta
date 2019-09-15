<?php

use Illuminate\Database\Seeder;
use App\model\Topic;


class TopicTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//farsi 10

		//id 1
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'ستایش';
		$topic->title         = 'به نام کردگار';
		$topic->save();


		//id 2
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل یکم: ادبیات تعلیمی';
		$topic->title         = 'درس یکم: چشمه';
		$topic->save();


		//id 3
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل یکم: ادبیات تعلیمی';
		$topic->title         = 'درس دوم : از آموختن، ننگ مدار';
		$topic->save();


		//id 4
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل دوم: ادبیات سفر و زندگی';
		$topic->title         = 'درس سوم: سفر به بصره';
		$topic->save();


		//id 5
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل دوم: ادبیات سفر و زندگی';
		$topic->title         = 'درس چهارم: درس آزاد (ادبیات بومی 1)';
		$topic->save();


		//id 6
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل دوم: ادبیات سفر و زندگی';
		$topic->title         = 'درس پنجم: کلاس نقّاشی';
		$topic->save();


		//id 7
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل سوم: ادبیات غنایی';
		$topic->title         = 'درس ششم: مهر و وفا';
		$topic->save();


		//id 8
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل سوم: ادبیات غنایی';
		$topic->title         = 'درس هفتم: جمال و کمال';
		$topic->save();


		//id 9
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل چهارم: ادبیات پایداری';
		$topic->title         = 'درس هشتم: پاسداری از حقیقت';
		$topic->save();


		//id 10
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل چهارم: ادبیات پایداری';
		$topic->title         = 'درس نهم: بیداد ظالمان';
		$topic->save();


		//id 11
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل پنجم: ادبیات انقلاب اسلامی';
		$topic->title         = 'درس دهم: دریادلان صف شکن';
		$topic->save();


		//id 12
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل پنجم: ادبیات انقلاب اسلامی';
		$topic->title         = 'درس یازدهم: خاک آزادگان';
		$topic->save();


		//id 13
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل ششم: ادبیات حماسی';
		$topic->title         = 'درس دوازدهم: رستم و اشکبوس';
		$topic->save();


		//id 14
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل ششم: ادبیات حماسی';
		$topic->title         = 'درس سیزدهم: گُردآفرید';
		$topic->save();


		//id 15
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل هفتم: ادبیات داستانی';
		$topic->title         = 'درس چهاردهم: طوطی و بقّال';
		$topic->save();


		//id 16
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل هفتم: ادبیات داستانی';
		$topic->title         = 'درس پانزدهم: درس آزاد (ادبیات بومی ٢)';
		$topic->save();


		//id 17
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل هفتم: ادبیات داستانی';
		$topic->title         = 'درس شانزدهم: خسرو';
		$topic->save();


		//id 18
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل هشتم: ادبیات جهان';
		$topic->title         = 'درس هفدهم: سپیده دم';
		$topic->save();


		//id 19
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'فصل هشتم: ادبیات جهان';
		$topic->title         = 'درس هجدهم: عظمتِ نگاه';
		$topic->save();


		//id 20
		$topic                = new Topic();
		$topic->gradeLessonId = 1;
		$topic->headLine      = 'نیایش';
		$topic->title         = 'الهی';
		$topic->save();
	}
}
