<?php

use Illuminate\Database\Seeder;
use App\model\Grade;


class GradeTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        //id 1
		$Grade          = new Grade();
		$Grade->code    = 10;
		$Grade->title   = 'دهم';
		$Grade->url     = 'tenth-grade';
        $Grade->save();

        //id 2
		$Grade          = new Grade();
		$Grade->code    = 11;
		$Grade->title   = 'یازدهم';
		$Grade->url     = 'eleventh-grade';
        $Grade->save();

        //id 3
		$Grade          = new Grade();
		$Grade->code    = 12;
		$Grade->title   = 'دوازدهم';
		$Grade->url     = 'twelfth-grade';
        $Grade->save();

	}
}
