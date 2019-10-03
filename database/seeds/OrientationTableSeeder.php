<?php

use Illuminate\Database\Seeder;
use App\model\Orientation;


class OrientationTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        //id 1
        $Orientation             = new Orientation();
		$Orientation->code       = '01';
		$Orientation->title      = 'ریاضی فیزیک';
        $Orientation->url        = 'Mathematical-Physics';
        $Orientation->save();

        //id 2
        $Orientation             = new Orientation();
        $Orientation->code       = '02';
        $Orientation->title      = 'علوم تجربی';
        $Orientation->url        = 'Science';
        $Orientation->save();

        //id 3
        $Orientation             = new Orientation();
		$Orientation->code       = '03';
		$Orientation->title      = 'ادبیات و علوم انسانی';
        $Orientation->url        = 'Literature-and-Humanities';
        $Orientation->save();

        //id 4
        $Orientation             = new Orientation();
		$Orientation->code       = '04';
		$Orientation->title      = 'عمومی';
        $Orientation->url        = 'General';
        $Orientation->save();


	}
}
