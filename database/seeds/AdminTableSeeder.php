<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;
use App\model\Admin;

class AdminTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{


        $Admin              = new Admin();
		$Admin->fullName    = 'علیرضا ربیعی';
		$Admin->username    = 'ali-username';
		$Admin->password         = Hash::make('123456789');
        $Admin->save();

        $Admin              = new Admin();
		$Admin->fullName    = 'محمد مهدی منصوری';
		$Admin->username    = 'mahdi-username';
		$Admin->password    = Hash::make('123456789');
        $Admin->save();


	}
}
