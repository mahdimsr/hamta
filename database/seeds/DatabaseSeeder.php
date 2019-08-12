<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([

			StudentTableSeeder::class,
			AdminTableSeeder::class,
            StateTableSeeder::class,
            CityTableSeeder::class,
			OrientationTableSeeder::class,
			GradeTableSeeder::class,
			LessonTableSeeder::class,

		]);
	}
}
