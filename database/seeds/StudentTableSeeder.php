<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;


class StudentTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('student')->insert([

			'fullName'   => 'محمد مهدی منصوری',
			'mobile'     => '09351603029',
			'password'   => Hash::make('123456789'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);
    }
}
