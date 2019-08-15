<?php

use Illuminate\Database\Seeder;

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
			GradeLessonTableSeeder::class,

		]);
	}
}
