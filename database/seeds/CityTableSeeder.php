<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('city')->insert([
			'stateid'     => '1',
			'name'   => 'تبریز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '1',
			'name'   => 'مراغه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '1',
			'name'   => 'مرند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '1',
			'name'   => 'میانه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '2',
			'name'   => 'ارومیه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '2',
			'name'   => 'خوی',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '2',
			'name'   => 'میاندوآب',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '2',
			'name'   => 'مهاباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '3',
			'name'   => 'اردبیل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '3',
			'name'   => 'پارس آباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '3',
			'name'   => 'مشگین شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '3',
			'name'   => 'خلخال',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '4',
			'name'   => 'اصفهان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '4',
			'name'   => 'کاشان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '4',
			'name'   => 'خمینی شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '4',
			'name'   => 'نجف آباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '5',
			'name'   => 'کرج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '5',
			'name'   => 'هشتگرد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '5',
			'name'   => 'نظرآباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '5',
			'name'   => 'محمد شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);     DB::table('city')->insert([
			'stateid'     => '6',
			'name'   => 'ایلام',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '6',
			'name'   => 'ایوان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '6',
			'name'   => 'دهلران',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '6',
			'name'   => 'آبدانان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '7',
			'name'   => 'بندر بوشهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '7',
			'name'   => 'برازجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '7',
			'name'   => 'بندر گناوه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '7',
			'name'   => 'خورموج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '8',
			'name'   => 'تهران',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '8',
			'name'   => 'اسلام شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '8',
			'name'   => 'گلستان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '8',
			'name'   => 'قدس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '9',
			'name'   => 'شهر کرد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '9',
			'name'   => 'بروجن',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '9',
			'name'   => 'فرخ شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '9',
			'name'   => 'فارسان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '10',
			'name'   => 'بیرجند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '10',
			'name'   => 'قائن',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '10',
			'name'   => 'فردوس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '10',
			'name'   => 'نهبندان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '11',
			'name'   => 'مشهد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '11',
			'name'   => 'سبزوار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '11',
			'name'   => 'نیشابور',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '11',
			'name'   => 'تربت حیدریه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '12',
			'name'   => 'بجنورد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '12',
			'name'   => 'شیروان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '12',
			'name'   => 'اسفراین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('city')->insert([
			'stateid'     => '12',
			'name'   => 'گرمه جاجرم',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '13',
			'name'   => 'اهواز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '13',
			'name'   => 'دزفول',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);       DB::table('city')->insert([
			'stateid'     => '13',
			'name'   => 'آبادان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '13',
			'name'   => 'خرمشهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '14',
			'name'   => 'زنجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '14',
			'name'   => 'ابهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '14',
			'name'   => 'خرمدره',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '14',
			'name'   => 'قیدار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '15',
			'name'   => 'سمنان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '15',
			'name'   => 'شاهرود',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '15',
			'name'   => 'دامغان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '15',
			'name'   => 'گرمسار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '16',
			'name'   => 'زاهدان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '16',
			'name'   => 'زابل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '16',
			'name'   => 'ایرانشهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '16',
			'name'   => 'چابهار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '17',
			'name'   => 'شیراز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '17',
			'name'   => 'کازرون',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '17',
			'name'   => 'جهرم',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '17',
			'name'   => 'لار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '17',
			'name'   => 'مرودشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '18',
			'name'   => 'قزوین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '18',
			'name'   => 'تاکستان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '18',
			'name'   => 'الوند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '18',
			'name'   => 'اقبالیه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '19',
			'name'   => 'قم',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '19',
			'name'   => 'قنوات',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '19',
			'name'   => 'جعفریه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '19',
			'name'   => 'کهک',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '20',
			'name'   => 'سنندج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '20',
			'name'   => 'سقز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '20',
			'name'   => 'مریوان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '20',
			'name'   => 'بانه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '21',
			'name'   => 'کرمان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '21',
			'name'   => 'سرجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '21',
			'name'   => 'رفسنجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '21',
			'name'   => 'جیرفت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '22',
			'name'   => 'کرمانشاه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '22',
			'name'   => 'اسلام آباد غرب',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '22',
			'name'   => 'هرسین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '22',
			'name'   => 'کنگاور',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '23',
			'name'   => 'یاسوج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '23',
			'name'   => 'دوگنبدان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '23',
			'name'   => 'دهدشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '23',
			'name'   => 'لیکک',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '24',
			'name'   => 'گرگان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '24',
			'name'   => 'گنبد کاووس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '24',
			'name'   => 'علی آباد کتول',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '24',
			'name'   => 'بندر ترکمن',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '25',
			'name'   => 'رشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '25',
			'name'   => 'بندر انزلی',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '25',
			'name'   => 'لاهیجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '25',
			'name'   => 'لنگرود',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '26',
			'name'   => 'خرم آباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '26',
			'name'   => 'بروجرد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '26',
			'name'   => 'دورود',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '26',
			'name'   => 'کوهدشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '27',
			'name'   => 'ساری',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '27',
			'name'   => 'بابل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '27',
			'name'   => 'آمل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '27',
			'name'   => 'قائم‌شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '28',
			'name'   => 'اراک',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '28',
			'name'   => 'ساوه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '28',
			'name'   => 'خمین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '28',
			'name'   => 'محلات',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '28',
			'name'   => 'شازند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '29',
			'name'   => 'بندرعباس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '29',
			'name'   => 'میناب',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '29',
			'name'   => 'دهباز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '29',
			'name'   => 'بندر لنگه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '30',
			'name'   => 'همدان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '30',
			'name'   => 'ملایر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '30',
			'name'   => 'نهاوند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '30',
			'name'   => 'تویسرکان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '31',
			'name'   => 'یزد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '31',
			'name'   => 'میبد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '31',
			'name'   => 'اردکان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('city')->insert([
			'stateid'     => '31',
			'name'   => 'بافق',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
    }
}
