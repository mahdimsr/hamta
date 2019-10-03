<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('province')->insert(
            [
			'name'     => 'آذربایجان شرقی',
			'areaCode'   => '041',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'آذربایجان غربی',
			'areaCode'   => '044',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'اردبیل',
			'areaCode'   => '045',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'اصفهان',
			'areaCode'   => '031',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'البرز',
			'areaCode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
            'name'     => 'ایلام',
            'areaCode'   => '084',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'بوشهر',
			'areaCode'   => '077',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'تهران',
			'areaCode'   => '021',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'چهارمحال بختیاری',
			'areaCode'   => '038',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'خراسان جنوبی',
			'areaCode'   => '056',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'خراسان رضوی',
			'areaCode'   => '051',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'خراسان شمالی',
			'areaCode'   => '058',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'خوزستان',
			'areaCode'   => '061',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'زنجان',
			'areaCode'   => '024',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'سمنان',
			'areaCode'   => '023',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'سیستان و بلوچستان',
			'areaCode'   => '054',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'فارس',
			'areaCode'   => '071',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'قزوین',
			'areaCode'   => '028',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'قم',
			'areaCode'   => '025',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'کردستان',
			'areaCode'   => '087',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'کرمان',
			'areaCode'   => '034',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'کرمانشاه',
			'areaCode'   => '083',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'کهگیلویه و بویراحمد',
			'areaCode'   => '074',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'گلستان',
			'areaCode'   => '017',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'گیلان',
			'areaCode'   => '013',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'لرستان',
			'areaCode'   => '066',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'مازندران',
			'areaCode'   => '011',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'مرکزی',
			'areaCode'   => '086',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'هرمزگان',
			'areaCode'   => '076',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'همدان',
			'areaCode'   => '081',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('province')->insert(
            [
			'name'     => 'یزد',
			'areaCode'   => '035',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
    }
}
