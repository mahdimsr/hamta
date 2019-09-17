<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;


class GradeTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		DB::table('grade')->insert([

			'code'       => '10',
			'title'      => 'دهم',
			'url'        => 'tenth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('grade')->insert([

			'code'       => '11',
			'title'      => 'یازدهم',
			'url'        => 'eleventh-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('grade')->insert([

			'code'       => '12',
			'title'      => 'دوازدهم',
			'url'        => 'twelfth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

	}
}
