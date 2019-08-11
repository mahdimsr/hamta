<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/','Content\ContentController@index')->name('homepage');
Route::namespace('Student')->group(function()
{
	Route::namespace('Auth')->group(function()
	{
		Route::get('/students/login', 'LoginController@show')->name('student_login_show');
        Route::post('/students/login', 'LoginController@login')->name('student_login_submit');
	});
	Route::middleware('auth')->namespace('Dashboard')->prefix('dashboard')->group(function()
	{
		Route::get('/','DashboardController@layout')->name('admin_dashboard');
		Route::get('/profile','DashboardController@profile')->name('admin_dashboard_profile');
	});
});
