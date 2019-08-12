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
        DB::table('citys')->insert([
			'stateid'     => '1',
			'cityname'   => 'تبریز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '1',
			'cityname'   => 'مراغه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '1',
			'cityname'   => 'مرند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '1',
			'cityname'   => 'میانه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '2',
			'cityname'   => 'ارومیه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '2',
			'cityname'   => 'خوی',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '2',
			'cityname'   => 'میاندوآب',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '2',
			'cityname'   => 'مهاباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '3',
			'cityname'   => 'اردبیل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '3',
			'cityname'   => 'پارس آباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '3',
			'cityname'   => 'مشگین شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '3',
			'cityname'   => 'خلخال',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '4',
			'cityname'   => 'اصفهان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '4',
			'cityname'   => 'کاشان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '4',
			'cityname'   => 'خمینی شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '4',
			'cityname'   => 'نجف آباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '5',
			'cityname'   => 'کرج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '5',
			'cityname'   => 'هشتگرد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '5',
			'cityname'   => 'نظرآباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '5',
			'cityname'   => 'محمد شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);     DB::table('citys')->insert([
			'stateid'     => '6',
			'cityname'   => 'ایلام',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '6',
			'cityname'   => 'ایوان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '6',
			'cityname'   => 'دهلران',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '6',
			'cityname'   => 'آبدانان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '7',
			'cityname'   => 'بندر بوشهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '7',
			'cityname'   => 'برازجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '7',
			'cityname'   => 'بندر گناوه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '7',
			'cityname'   => 'خورموج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '8',
			'cityname'   => 'تهران',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '8',
			'cityname'   => 'اسلام شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '8',
			'cityname'   => 'گلستان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '8',
			'cityname'   => 'قدس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '9',
			'cityname'   => 'شهر کرد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '9',
			'cityname'   => 'بروجن',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '9',
			'cityname'   => 'فرخ شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '9',
			'cityname'   => 'فارسان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '10',
			'cityname'   => 'بیرجند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '10',
			'cityname'   => 'قائن',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '10',
			'cityname'   => 'فردوس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '10',
			'cityname'   => 'نهبندان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '11',
			'cityname'   => 'مشهد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '11',
			'cityname'   => 'سبزوار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '11',
			'cityname'   => 'نیشابور',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '11',
			'cityname'   => 'تربت حیدریه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '12',
			'cityname'   => 'بجنورد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '12',
			'cityname'   => 'شیروان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '12',
			'cityname'   => 'اسفراین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('citys')->insert([
			'stateid'     => '12',
			'cityname'   => 'گرمه جاجرم',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '13',
			'cityname'   => 'اهواز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '13',
			'cityname'   => 'دزفول',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);       DB::table('citys')->insert([
			'stateid'     => '13',
			'cityname'   => 'آبادان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '13',
			'cityname'   => 'خرمشهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '14',
			'cityname'   => 'زنجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '14',
			'cityname'   => 'ابهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '14',
			'cityname'   => 'خرمدره',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '14',
			'cityname'   => 'قیدار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '15',
			'cityname'   => 'سمنان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '15',
			'cityname'   => 'شاهرود',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '15',
			'cityname'   => 'دامغان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '15',
			'cityname'   => 'گرمسار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '16',
			'cityname'   => 'زاهدان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '16',
			'cityname'   => 'زابل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '16',
			'cityname'   => 'ایرانشهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '16',
			'cityname'   => 'چابهار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '17',
			'cityname'   => 'شیراز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '17',
			'cityname'   => 'کازرون',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '17',
			'cityname'   => 'جهرم',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '17',
			'cityname'   => 'لار',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '17',
			'cityname'   => 'مرودشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '18',
			'cityname'   => 'قزوین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '18',
			'cityname'   => 'تاکستان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '18',
			'cityname'   => 'الوند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '18',
			'cityname'   => 'اقبالیه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '19',
			'cityname'   => 'قم',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '19',
			'cityname'   => 'قنوات',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '19',
			'cityname'   => 'جعفریه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '19',
			'cityname'   => 'کهک',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '20',
			'cityname'   => 'سنندج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '20',
			'cityname'   => 'سقز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '20',
			'cityname'   => 'مریوان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '20',
			'cityname'   => 'بانه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '21',
			'cityname'   => 'کرمان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '21',
			'cityname'   => 'سرجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '21',
			'cityname'   => 'رفسنجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '21',
			'cityname'   => 'جیرفت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '22',
			'cityname'   => 'کرمانشاه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '22',
			'cityname'   => 'اسلام آباد غرب',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '22',
			'cityname'   => 'هرسین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '22',
			'cityname'   => 'کنگاور',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '23',
			'cityname'   => 'یاسوج',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '23',
			'cityname'   => 'دوگنبدان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '23',
			'cityname'   => 'دهدشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '23',
			'cityname'   => 'لیکک',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '24',
			'cityname'   => 'گرگان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '24',
			'cityname'   => 'گنبد کاووس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '24',
			'cityname'   => 'علی آباد کتول',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '24',
			'cityname'   => 'بندر ترکمن',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '25',
			'cityname'   => 'رشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '25',
			'cityname'   => 'بندر انزلی',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '25',
			'cityname'   => 'لاهیجان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '25',
			'cityname'   => 'لنگرود',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '26',
			'cityname'   => 'خرم آباد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '26',
			'cityname'   => 'بروجرد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '26',
			'cityname'   => 'دورود',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '26',
			'cityname'   => 'کوهدشت',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '27',
			'cityname'   => 'ساری',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '27',
			'cityname'   => 'بابل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '27',
			'cityname'   => 'آمل',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '27',
			'cityname'   => 'قائم‌شهر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '28',
			'cityname'   => 'اراک',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '28',
			'cityname'   => 'ساوه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '28',
			'cityname'   => 'خمین',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '28',
			'cityname'   => 'محلات',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '28',
			'cityname'   => 'شازند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '29',
			'cityname'   => 'بندرعباس',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '29',
			'cityname'   => 'میناب',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '29',
			'cityname'   => 'دهباز',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '29',
			'cityname'   => 'بندر لنگه',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '30',
			'cityname'   => 'همدان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '30',
			'cityname'   => 'ملایر',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '30',
			'cityname'   => 'نهاوند',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '30',
			'cityname'   => 'تویسرکان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '31',
			'cityname'   => 'یزد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '31',
			'cityname'   => 'میبد',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '31',
			'cityname'   => 'اردکان',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);        DB::table('citys')->insert([
			'stateid'     => '31',
			'cityname'   => 'بافق',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
    }
}
