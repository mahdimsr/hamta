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

        //id 1
		$Category           = new Category();
		$Category->title    = 'زبان و ادبیات فارسی';
		$Category->save();

        //id 2
		$Category           = new Category();
		$Category->title    = 'عربی';
		$Category->save();

        //id 3
		$Category           = new Category();
		$Category->title    = 'فرهنگ و معارف اسلامی';
		$Category->save();

        //id 4
		$Category           = new Category();
		$Category->title    = 'زبان انگلیسی';
		$Category->save();

        //id 5
		$Category           = new Category();
		$Category->title    = 'ریاضیات';
		$Category->save();

        //id 6
		$Category           = new Category();
		$Category->title    = 'فیزیک';
		$Category->save();

        //id 7
		$Category           = new Category();
		$Category->title    = 'شیمی';
		$Category->save();


        //id 8
		$Category           = new Category();
		$Category->title    = 'زیست شناسی';
		$Category->save();

        //id 9
		$Category           = new Category();
		$Category->title    = 'زمین شناسی';
		$Category->save();

        //id 10
		$Category           = new Category();
		$Category->title    = 'اقتصاد';
		$Category->save();

        //id 11
		$Category           = new Category();
		$Category->title    = 'تاریخ';
		$Category->save();

        //id 12
		$Category           = new Category();
		$Category->title    = 'جغرافیا';
		$Category->save();

        //id 13
		$Category           = new Category();
		$Category->title    = 'علوم اجتماعی';
		$Category->save();

        //id 14
		$Category           = new Category();
		$Category->title    = 'فلسفه';
        $Category->save();

        //id 15
        $Category           = new Category();
		$Category->title    = 'منطق';
        $Category->save();

        //id 16
        $Category           = new Category();
		$Category->title    = 'روانشناسی';
        $Category->save();

    }
}
