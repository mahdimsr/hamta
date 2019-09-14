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
			'title'      => 'ریاضی فیزیک',
			'url'        => 'MathematicalPhysics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('orientation')->insert([

			'code'       => '02',
			'title'      => 'علوم تجربی',
			'url'        => 'Science',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('orientation')->insert([

			'code'       => '03',
			'title'      => 'ادبیات و علوم انسانی',
			'url'        => 'LiteratureandHumanities',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

	}
}
