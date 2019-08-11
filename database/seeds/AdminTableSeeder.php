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
		DB::table('student')->insert([

			'fullName'   => 'علی رضا ربیعی',
			'mobile'     => '09386721318',
			'password'   => Hash::make('123456789'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);
    }
}
