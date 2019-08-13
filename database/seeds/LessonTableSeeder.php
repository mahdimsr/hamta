<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//general

		DB::table('lesson')->insert([

			'code'       => '01',
			'title'      => 'ادبیات',
			'url'      => 'literature',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '02',
			'title'      => 'عربی',
			'url'      => 'arabic',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '03',
			'title'      => 'دین و زندگی',
			'url'      => 'religion-and-life',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '04',
			'title'      => 'زبان انگلیسی',
			'url'      => 'english',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		//math

		DB::table('lesson')->insert([

			'code'       => '11',
			'title'      => 'ریاضی',
			'url'      => 'math',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '12',
			'title'      => 'هندسه',
			'url'      => 'geometry',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '13',
			'title'      => 'آمار',
			'url'      => 'statistics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '14',
			'title'      => 'ریاضیات گسسته',
			'url'      => 'discrete-mathematics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		//physics

		DB::table('lesson')->insert([

			'code'       => '22',
			'title'      => 'فیزیک',
			'url'      => 'physics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		//chemistry

		DB::table('lesson')->insert([

			'code'       => '33',
			'title'      => 'شیمی',
			'url'      => 'chemistry',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);
    }
}
