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

        });

        Route::middleware('auth:student-api')->get('/test', function()
        {

            return 'test';

        });


    });
