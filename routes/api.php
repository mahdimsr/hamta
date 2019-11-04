<?php

    use Illuminate\Http\Request;
    use \Illuminate\Support\Facades\Route;


    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

    //Student Api
    Route::namespace('Api\Student')->group(function()
    {

        Route::prefix('auth')->group(function()
        {

            Route::post('login', 'AuthController@login')->name('api_student_login');
            Route::post('register', 'AuthController@register')->name('api_student_register');

        });

        Route::middleware('auth:api')->group(function()
        {

            Route::get('/index', 'IndexController@index')->name('api_student_index');
            Route::get('/cart', 'IndexController@cart')->name('api_student_cart');


            Route::prefix('lessonExams')->group(function()
            {

                Route::get('/', 'LessonExamController@lessonExams')->name('api_student_lessonExams');

                Route::post('/add', 'LessonExamController@addToCart')->name('api_student_lessonExam_add');

            });
        });


        Route::get('test', function(Request $request)
        {

            $grade = \App\model\Grade::query()->where('url', 'Tenth')->first();

            $orientation = \App\model\Orientation::query()->where('url', 'Science')->first();

            $lessonExams = \App\model\LessonExam::filterExam($grade,$orientation);


            return $lessonExams;
        });

    });
