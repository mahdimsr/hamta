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

			'code'       => '1',
			'title'      => 'اول',
			'url'        => 'first-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '2',
			'title'      => 'دوم',
			'url'        => 'second-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '3',
			'title'      => 'سوم',
			'url'        => 'third-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '4',
			'title'      => 'چهارم',
			'url'        => 'fourth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '5',
			'title'      => 'پنجم',
			'url'        => 'fifth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '6',
			'title'      => 'ششم',
			'url'        => 'sixth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '7',
			'title'      => 'هفتم',
			'url'        => 'seventh-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '8',
			'title'      => 'هشتم',
			'url'        => 'eighth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('grade')->insert([

			'code'       => '9',
			'title'      => 'نهم',
			'url'        => 'ninth-grade',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

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
