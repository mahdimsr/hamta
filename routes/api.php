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

        Route::get('/checkUpdate', 'IndexController@checkUpdate')->name('api_student_update');


        Route::middleware('auth:api')->group(function()
        {

            Route::get('/index', 'IndexController@index')->name('api_student_index');

            Route::get('/scholarShip','IndexController@scholarship')->name('api_student_scholarship');
            Route::post('/submitScholarShip','IndexController@submitScholarShip')->name('api_student_submitScholarShip');



            Route::prefix('profile')->group(function()
            {

                Route::get('/myExams', 'ProfileController@myExams')->name('api_student_myExams');
                Route::get('/myProfile', 'ProfileController@myProfile')->name('api_student_myProfile');
                Route::post('/updateMyProfile', 'ProfileController@updateMyProfile')
                     ->name('api_student_updateMyProfile');

                Route::get('/discountCodes','ProfileController@discountCodes')->name('api_student_discounts');



            });

            Route::prefix('cart')->group(function()
            {

                Route::get('/', 'CartController@cart')->name('api_student_cart');

                Route::post('/remove', 'CartController@removeCartItem')->name('api_student_removeCartItem');

                Route::post('/purchase', 'CartController@purchase')->name('api_student_purchaseCart');

                Route::get('/transactions', 'CartController@transactions')->name('api_student_transactions');
            });


            Route::prefix('lessonExams')->group(function()
            {

                Route::get('/', 'LessonExamController@lessonExams')->name('api_student_lessonExams');

                Route::post('/add', 'LessonExamController@addToCart')->name('api_student_lessonExam_add');

                Route::get('/questions/{lessonExamId}', 'LessonExamController@questions')
                     ->name('api_student_lessonExam_questions');

                Route::post('/finishExam/{lessonExamId}', 'LessonExamController@finishExam')
                     ->name('api_student_lessonExam_finishExam');


                Route::get('/result/{lessonExamId}','LessonExamController@result')->name('api_student_lessonExam_result');

            });
        });


        Route::get('test', function()
        {

            $lessonExam = \App\model\LessonExam::query()->find(1);


            return $lessonExam;
        });

    });
