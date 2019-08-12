<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;


class OrientationTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('orientation')->insert([

			'code'       => '01',
			'title'      => 'ریاضی و فیزیک',
			'query'      => 'mathematics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('orientation')->insert([

			'code'       => '02',
			'title'      => 'تجربی',
			'query'      => 'experimental',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('orientation')->insert([

			'code'       => '03',
			'title'      => 'انسانی',
			'query'      => 'human-discipline',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);
	}
}
