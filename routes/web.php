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

		Route::get('/auth', 'AuthController@show')->name('student');
		Route::post('/login', 'AuthController@login')->name('student_login');
		Route::post('/register', 'AuthController@register')->name('student_register');
        Route::get('/logout','AuthController@logout')->name('student_logout');

	});
	Route::middleware('auth:student')->namespace('Dashboard')->prefix('dashboard')->group(function()
	{

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
			Route::post('/remove', 'LessonExamController@remove')->name('admin_lExam_remove');

		});


		Route::prefix('grades')->group(function()
		{
			Route::get('/', 'GradeController@grades')->name('admin_grades');
			Route::get('/remove', 'GradeController@remove')->name('admin_grades_remove');
			Route::get('/add', 'GradeController@addShow')->name('admin_grades_addShow');
			Route::post('/add', 'GradeController@add')->name('admin_grades_add');
			Route::get('/edit', 'GradeController@editShow')->name('admin_grades_editShow');
			Route::post('/edit', 'GradeController@edit')->name('admin_grades_edit');

		});


		Route::prefix('orientations')->group(function()
		{
			Route::get('/','OrientationController@orientations')->name('admin_orientations');
			Route::get('/remove','OrientationController@remove')->name('admin_orientations_remove');
			Route::get('/add','OrientationController@addShow')->name('admin_orientations_addShow');
			Route::post('/add','OrientationController@add')->name('admin_orientations_add');
			Route::get('/edit','OrientationController@editShow')->name('admin_orientations_editShow');
			Route::post('/edit','OrientationController@edit')->name('admin_orientations_edit');
		});


	});

});
