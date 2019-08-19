<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('state')->insert(
            [
			'name'     => 'آذربایجان شرقی',
			'areaCode'   => '041',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'آذربایجان غربی',
			'areaCode'   => '044',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'اردبیل',
			'areaCode'   => '045',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'اصفهان',
			'areaCode'   => '031',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'البرز',
			'areaCode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
            'name'     => 'البرز',
                'areaCode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'بوشهر',
			'areaCode'   => '077',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'تهران',
			'areaCode'   => '021',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'چهارمحال بختیاری',
			'areaCode'   => '038',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خراسان جنوبی',
			'areaCode'   => '056',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خراسان رضوی',
			'areaCode'   => '051',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خراسان شمالی',
			'areaCode'   => '058',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خوزستان',
			'areaCode'   => '061',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'زنجان',
			'areaCode'   => '024',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'سمنان',
			'areaCode'   => '023',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'سیستان و بلوچستان',
			'areaCode'   => '054',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'فارس',
			'areaCode'   => '071',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'قزوین',
			'areaCode'   => '028',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'قم',
			'areaCode'   => '025',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کردستان',
			'areaCode'   => '087',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کرمان',
			'areaCode'   => '034',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کرمانشاه',
			'areaCode'   => '083',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کهگیلویه و بویراحمد',
			'areaCode'   => '074',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'گلستان',
			'areaCode'   => '017',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'گیلان',
			'areaCode'   => '013',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'لرستان',
			'areaCode'   => '066',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'مازندران',
			'areaCode'   => '011',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'مرکزی',
			'areaCode'   => '086',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'هرمزگان',
			'areaCode'   => '076',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'همدان',
			'areaCode'   => '081',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'یزد',
			'areaCode'   => '035',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
    }
}
