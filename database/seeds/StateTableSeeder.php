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
			'areacode'   => '041',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'آذربایجان غربی',
			'areacode'   => '044',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'اردبیل',
			'areacode'   => '045',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'اصفهان',
			'areacode'   => '031',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'البرز',
			'areacode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
            'name'     => 'البرز',
                'areacode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'بوشهر',
			'areacode'   => '077',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'تهران',
			'areacode'   => '021',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'چهارمحال بختیاری',
			'areacode'   => '038',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خراسان جنوبی',
			'areacode'   => '056',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خراسان رضوی',
			'areacode'   => '051',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خراسان شمالی',
			'areacode'   => '058',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'خوزستان',
			'areacode'   => '061',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'زنجان',
			'areacode'   => '024',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'سمنان',
			'areacode'   => '023',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'سیستان و بلوچستان',
			'areacode'   => '054',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'فارس',
			'areacode'   => '071',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'قزوین',
			'areacode'   => '028',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'قم',
			'areacode'   => '025',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کردستان',
			'areacode'   => '087',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کرمان',
			'areacode'   => '034',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کرمانشاه',
			'areacode'   => '083',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'کهگیلویه و بویراحمد',
			'areacode'   => '074',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'گلستان',
			'areacode'   => '017',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'گیلان',
			'areacode'   => '013',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'لرستان',
			'areacode'   => '066',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'مازندران',
			'areacode'   => '011',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'مرکزی',
			'areacode'   => '086',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'هرمزگان',
			'areacode'   => '076',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'همدان',
			'areacode'   => '081',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'name'     => 'یزد',
			'areacode'   => '035',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
    }
}
