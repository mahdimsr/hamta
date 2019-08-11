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


Route::get('/', 'Content\ContentController@index')->name('homepage');
Route::namespace('Student')->group(function()
{
	Route::namespace('Auth')->group(function()
	{
		Route::get('/login', 'LoginController@show')->name('student_login_show');
        Route::post('/login', 'LoginController@login')->name('student_login_submit');
        Route::get('/logout','LoginController@logout')->name('student_logout');
	});
	Route::middleware('auth')->namespace('Dashboard')->prefix('dashboard')->group(function()
	{
		Route::get('/','DashboardController@layout')->name('student_dashboard');
        Route::get('/profile','DashboardController@profile')->name('student_dashboard_profile');
        Route::post('/profile','DashboardController@update')->name('student_dashboard_profile_update');
	});
});

Route::namespace('Admin')->group(function()
{

	Route::namespace('Auth')->group(function()
	{
		Route::get('/adminLogin', 'LoginController@show')->name('admin_login_show');
		Route::post('/adminLogin', 'LoginController@login')->name('admin_login_submit');
		Route::get('/adminLogOut', 'LoginController@logout')->name('admin_logout');
	});

	Route::middleware('auth:admin')->namespace('Dashboard')->prefix('admin/dashboard')->group(function()
	{
		Route::get('/', 'DashboardController@dashboard')->name('admin_dashboard');

		Route::prefix('exams')->group(function()
		{
			Route::get('/', 'LessonExamController@exams')->name('admin_exams');
			Route::get('/add', 'LessonExamController@addShow')->name('admin_exams_addShow');
			Route::post('/add', 'LessonExamController@add')->name('admin_lExam_add');

		});


	});

});
