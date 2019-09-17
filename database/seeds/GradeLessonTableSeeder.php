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

			'lessonId'      => '05',
			'gradeId'       => '01',
            'orientationId' => '01',
            'name'         => 'ریاضی (1)',
			'code'          => '110211',
			'ratio'         => '4',
			'type'          => 'EXPERT',
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),

		]);

	}
}
