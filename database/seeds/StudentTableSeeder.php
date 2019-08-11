<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('student')->insert([
			'mobile' => '09386721318',
			'password' => Hash::make('123456789'),
		]);
    }
}
