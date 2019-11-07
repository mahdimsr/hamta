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

            Route::prefix('cart')->group(function()
            {
                Route::get('/', 'CartController@cart')->name('api_student_cart');

                Route::post('/remove', 'CartController@removeCartItem')->name('api_student_removeCartItem');

                Route::post('/purchase','CartController@purchase')->name('api_student_purchaseCart');
            });




            Route::prefix('lessonExams')->group(function()
            {

                Route::get('/', 'LessonExamController@lessonExams')->name('api_student_lessonExams');

                Route::post('/add', 'LessonExamController@addToCart')->name('api_student_lessonExam_add');


            });
        });


        Route::post('test', function(Request $request)
        {



            return $request;
        });

    });
