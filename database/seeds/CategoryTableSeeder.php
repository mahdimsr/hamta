<?php

use Illuminate\Database\Seeder;
use App\model\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$Category           = new Category();
		$Category->title    = 'زبان و ادبیات فارسی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'عربی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'فرهنگ و معارف اسلامی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'زبان انگلیسی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'ریاضیات';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'فیزیک';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'شیمی';
		$Category->save();



		$Category           = new Category();
		$Category->title    = 'زیست شناسی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'زمین شناسی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'اقتصاد';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'تاریخ';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'جغرافیا';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'علوم اجتماعی';
		$Category->save();


		$Category           = new Category();
		$Category->title    = 'فلسفه';
        $Category->save();


        $Category           = new Category();
		$Category->title    = 'منطق';
        $Category->save();


        $Category           = new Category();
		$Category->title    = 'روانشناسی';
        $Category->save();

    }
}
