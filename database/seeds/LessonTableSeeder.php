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

		DB::table('lesson')->insert([

			'code'       => '01',
			'title'      => 'زبان و ادبیات فارسی',
			'url'        => 'PersianLanguageandLiterature',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '02',
			'title'      => 'زبان عربی',
			'url'        => 'Arabic',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '03',
			'title'      => 'فرهنگ و معارف اسلامی',
			'url'        => 'IslamicCultureandEducation',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '04',
			'title'      => 'زبان انگلیسی',
			'url'        => 'EnglishLanguage',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '05',
			'title'      => 'ریاضیات',
			'url'        => 'Mathematic',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '06',
			'title'      => 'فیزیک',
			'url'        => 'Physics',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '07',
			'title'      => 'شیمی',
			'url'        => 'Chemistry',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '08',
			'title'      => 'زمین ­شناسی',
			'url'        => 'Geology',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

		]);

		DB::table('lesson')->insert([

			'code'       => '09',
			'title'      => 'زیست شناسی',
			'url'        => 'Biology',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

		DB::table('lesson')->insert([

			'code'       => '10',
			'title'      => 'اقتصاد',
			'url'        => 'Economy',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

        DB::table('lesson')->insert([

			'code'       => '11',
			'title'      => 'تاریخ',
			'url'        => 'History',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

        DB::table('lesson')->insert([

			'code'       => '12',
			'title'      => 'جغرافیا',
			'url'        => 'Geography',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

        DB::table('lesson')->insert([

			'code'       => '13',
			'title'      => 'علوم اجتماعی',
			'url'        => 'SocialScience',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

        DB::table('lesson')->insert([

			'code'       => '14',
			'title'      => 'فلسفه',
			'url'        => 'Philosophy',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

        DB::table('lesson')->insert([

			'code'       => '15',
			'title'      => 'منطق',
			'url'        => 'Logic',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

        DB::table('lesson')->insert([

			'code'       => '16',
			'title'      => 'روان­شناسی',
			'url'        => 'Psychology',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),

        ]);

    }
}
