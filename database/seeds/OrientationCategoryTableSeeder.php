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

        //id 1
		$OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 1;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 2
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 2;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 3
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 3;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 4
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 4;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 5
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 5;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 6
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 6;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 7
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 1;
		$OrientationCategory->categoryId      = 7;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //Science

        //id 8
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 1;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 9
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 2;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 10
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 3;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 11
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 4;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 12
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 5;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 13
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 6;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 14
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 7;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 15
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 8;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 16
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 2;
		$OrientationCategory->categoryId      = 9;
        $OrientationCategory->ratio           = 1;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //Literature and Humanities

        //id 17
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 1;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 18
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 2;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 19
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 3;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 20
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 4;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'GENERAL';
        $OrientationCategory->save();

        //id 21
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 5;
        $OrientationCategory->ratio           = 2;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 22
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 10;
        $OrientationCategory->ratio           = 1;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 23
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 1;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 24
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 2;
        $OrientationCategory->ratio           = 4;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 25
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 11;
        $OrientationCategory->ratio           = 1;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 26
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 12;
        $OrientationCategory->ratio           = 1;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 27
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 13;
        $OrientationCategory->ratio           = 1;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 28
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 14;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 29
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 15;
        $OrientationCategory->ratio           = 3;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

        //id 30
        $OrientationCategory                  = new OrientationCategory();
		$OrientationCategory->orientationId   = 3;
		$OrientationCategory->categoryId      = 16;
        $OrientationCategory->ratio           = 1;
        $OrientationCategory->type            = 'EXPERT';
        $OrientationCategory->save();

    }
}
