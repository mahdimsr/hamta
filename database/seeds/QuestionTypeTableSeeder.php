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


		//id 2
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'تاریخ ادبیات و اعلام و درآمدها';


		//id 3
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'آرایه های ادبی';


		//id 4
		$questionType             = new QuestionType();
		$questionType->categoryId = 1;
		$questionType->title      = 'زبان فارسی';


		//id 5
		$questionType             = new QuestionType();
		$questionType->categoryId = 2;
		$questionType->title      = 'ترجمه';


		//id 6
		$questionType             = new QuestionType();
		$questionType->categoryId = 2;
		$questionType->title      = 'درک مطلب';


		//id 7
		$questionType             = new QuestionType();
		$questionType->categoryId = 2;
		$questionType->title      = 'قواعد';


		//id 8
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'واژگان';


		//id 9
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'گرامر';


		//id 10
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'کلوز تست';


		//id 11
		$questionType             = new QuestionType();
		$questionType->categoryId = 4;
		$questionType->title      = 'درک مطلب';

	}
}
