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
			'statename'     => 'آذربایجان شرقی',
			'areacode'   => '041',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'آذربایجان غربی',
			'areacode'   => '044',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'اردبیل',
			'areacode'   => '045',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'اصفهان',
			'areacode'   => '031',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'البرز',
			'areacode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
            'statename'     => 'البرز',
                'areacode'   => '026',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'بوشهر',
			'areacode'   => '077',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'تهران',
			'areacode'   => '021',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'چهارمحال بختیاری',
			'areacode'   => '038',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'خراسان جنوبی',
			'areacode'   => '056',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'خراسان رضوی',
			'areacode'   => '051',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'خراسان شمالی',
			'areacode'   => '058',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'خوزستان',
			'areacode'   => '061',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'زنجان',
			'areacode'   => '024',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'سمنان',
			'areacode'   => '023',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'سیستان و بلوچستان',
			'areacode'   => '054',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'فارس',
			'areacode'   => '071',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'قزوین',
			'areacode'   => '028',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'قم',
			'areacode'   => '025',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'کردستان',
			'areacode'   => '087',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'کرمان',
			'areacode'   => '034',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'کرمانشاه',
			'areacode'   => '083',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'کهگیلویه و بویراحمد',
			'areacode'   => '074',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'گلستان',
			'areacode'   => '017',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'گیلان',
			'areacode'   => '013',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'لرستان',
			'areacode'   => '066',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'مازندران',
			'areacode'   => '011',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'مرکزی',
			'areacode'   => '086',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'هرمزگان',
			'areacode'   => '076',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'همدان',
			'areacode'   => '081',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
        DB::table('state')->insert(
            [
			'statename'     => 'یزد',
			'areacode'   => '035',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
        ]);
    }
}
