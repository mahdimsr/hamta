<?php

use Illuminate\Database\Seeder;
use App\model\QuestionType;


class QuestionTypeTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//id 1
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'معنا و املای واژگان';
		$questionType->save();


		//id 2
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'تاریخ ادبیات و اعلام و درآمدها';
		$questionType->save();


		//id 3
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'آرایه های ادبی';
		$questionType->save();


		//id 4
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'زبان فارسی';
		$questionType->save();


		//id 5
		$questionType             = new QuestionType();
		$questionType->categoryId = 2;
		$questionType->title      = 'ترجمه';


		//id 6
		$questionType             = new QuestionType();
		$questionType->categoryId = 2;
		$questionType->title      = 'درک مطلب';
		$questionType->save();


		//id 7
		$questionType             = new QuestionType();
		$questionType->categoryId = 2;
		$questionType->title      = 'قواعد';
		$questionType->save();


		//id 8
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'واژگان';
		$questionType->save();


		//id 9
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'گرامر';
		$questionType->save();


		//id 10
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'کلوز تست';
		$questionType->save();


		//id 11
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'درک مطلب';
		$questionType->save();

	}
}
