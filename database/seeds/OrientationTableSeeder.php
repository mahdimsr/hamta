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
			'url'        => 'mathematics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('orientation')->insert([

			'code'       => '02',
			'title'      => 'تجربی',
			'url'        => 'experimental',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('orientation')->insert([

			'code'       => '03',
			'title'      => 'انسانی',
			'url'        => 'human-discipline',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);
	}
}
