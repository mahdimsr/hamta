<?php

use Illuminate\Database\Seeder;
use App\model\OrientationCategory;

class OrientationCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //MathematicPhysics

		$OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '1';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '2';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '3';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '4';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '5';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '6';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '1';
		$OrientationCategory->categoryId      = '7';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //Science

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '1';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '2';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '3';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '4';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '5';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '6';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '7';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '8';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '2';
		$OrientationCategory->categoryId      = '9';
        $OrientationCategory->ratio           = '1';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //Literature and Humanities

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '1';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '2';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '3';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '4';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '5';
        $OrientationCategory->ratio           = '2';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '10';
        $OrientationCategory->ratio           = '1';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '1';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '2';
        $OrientationCategory->ratio           = '4';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '11';
        $OrientationCategory->ratio           = '1';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '12';
        $OrientationCategory->ratio           = '1';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '13';
        $OrientationCategory->ratio           = '1';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '14';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '15';
        $OrientationCategory->ratio           = '3';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = '3';
		$OrientationCategory->categoryId      = '16';
        $OrientationCategory->ratio           = '1';
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();
    }
}
