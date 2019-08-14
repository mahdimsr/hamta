<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;


class GradeLessonTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('grade_lesson')->insert([

			/*ریاضی دهم رایضی فیزیک ضریب 4 تخصصی*/

			'lessonId'      => '5',
			'gradeId'       => '1',
			'orientationId' => '1',
			'code'          => '111001',
			'ratio'         => '4',
			'type'          => 'EXPERT',
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),

		]);

		DB::table('grade_lesson')->insert([

			'lessonId'      => '5',
			'gradeId'       => '2',
			'orientationId' => '1',
			'code'          => '111101',
			'ratio'         => '4',
			'type'          => 'EXPERT',
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),

		]);

		DB::table('grade_lesson')->insert([

			'lessonId'      => '1',
			'gradeId'       => '2',
			'orientationId' => '1',
			'code'          => '011101',
			'ratio'         => '2',
			'type'          => 'GENERAL',
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),

		]);

		DB::table('grade_lesson')->insert([

			'lessonId'      => '2',
			'gradeId'       => '2',
			'orientationId' => '1',
			'code'          => '021101',
			'ratio'         => '2',
			'type'          => 'GENERAL',
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),

		]);
	}
}
