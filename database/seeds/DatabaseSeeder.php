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
            // CityTableSeeder::class,
            // ProvinceTableSeeder::class,
			OrientationTableSeeder::class,
			CategoryTableSeeder::class,
			OrientationCategoryTableSeeder::class,
			GradeTableSeeder::class,
            LessonTableSeeder::class,
			GradeLessonTableSeeder::class,
			TopicTableSeeder::class,
			TopicGradeLessonSeeder::class,
			QuestionTypeTableSeeder::class,
            LessonExamTableSeeder::class,
		]);
	}
}
