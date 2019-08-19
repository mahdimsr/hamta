<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;


class AdminTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('admin')->insert([

			'fullName'   => 'علیرضا ربیعی',
			'username'   => 'ali-username',
			'password'   => Hash::make('123456789'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('admin')->insert([

			'fullName'   => 'ممد میتی منصوری',
			'username'   => 'mahdi-username',
			'password'   => Hash::make('123456789'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);
	}
}
