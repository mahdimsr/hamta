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
		Route::get('/logout', 'AuthController@logout')->name('student_logout');

	});
	Route::middleware('auth:student')->namespace('Dashboard')->prefix('dashboard')->group(function()
	{

		Route::get('/profile', 'DashboardController@profile')->name('student_dashboard_profile');
		Route::post('/profile', 'DashboardController@update')->name('student_dashboard_profile_update');

	});
});

Route::namespace('Admin')->group(function()
{

	Route::namespace('Auth')->group(function()
	{
		Route::get('/adminLogin', 'LoginController@show')->name('admin_auth_show');
		Route::post('/adminLogin', 'LoginController@login')->name('admin_login_submit');
		Route::get('/adminLogOut', 'LoginController@logout')->name('admin_logout');
	});

	Route::middleware('auth:admin')->namespace('Dashboard')->prefix('admin/dashboard')->group(function()
	{
		Route::get('/', 'DashboardController@dashboard')->name('admin_dashboard');

		Route::prefix('admins')->group(function()
		{
			Route::get('/', 'RegisterController@admins')->name('admin_admins');
			Route::get('/add', 'RegisterController@addShow')->name('admin_admins_addShow');
			Route::post('/add', 'RegisterController@add')->name('admin_admins_add');
			Route::get('/edit/{username}', 'RegisterController@editShow')->name('admin_admins_editShow');
			Route::post('/edit/{username}', 'RegisterController@edit')->name('admin_admins_edit');
		});

		Route::prefix('exams')->group(function()
		{
			Route::get('/', 'DashboardController@exams')->name('admin_exams');

			Route::prefix('/lessonToLesson')->group(function()
			{
				Route::get('/', 'LessonExamController@exams')->name('admin_ltl_exams');
				Route::get('/add', 'LessonExamController@addShow')->name('admin_ltlExams_addShow');
				Route::post('/add', 'LessonExamController@add')->name('admin_lExam_add');
				Route::post('/remove', 'LessonExamController@remove')->name('admin_lExam_remove');
			});



		});


		Route::prefix('grades')->group(function()
		{
			Route::get('/', 'GradeController@grades')->name('admin_grades');
			Route::get('/remove/{url}', 'GradeController@remove')->name('admin_grades_remove');
			Route::get('/add', 'GradeController@addShow')->name('admin_grades_addShow');
			Route::post('/add', 'GradeController@add')->name('admin_grades_add');
			Route::get('/edit/{url}', 'GradeController@editShow')->name('admin_grades_editShow');
			Route::post('/edit/{url}', 'GradeController@edit')->name('admin_grades_edit');

		});


		Route::prefix('orientations')->group(function()
		{
			Route::get('/', 'OrientationController@orientations')->name('admin_orientations');
			Route::get('/remove/{url}', 'OrientationController@remove')->name('admin_orientations_remove');
			Route::get('/add', 'OrientationController@addShow')->name('admin_orientations_addShow');
			Route::post('/add', 'OrientationController@add')->name('admin_orientations_add');
			Route::get('/edit/{url}', 'OrientationController@editShow')->name('admin_orientations_editShow');
			Route::post('/edit/{url}', 'OrientationController@edit')->name('admin_orientations_edit');
		});

		Route::prefix('gradeLessons')->group(function()
		{
			Route::get('/', 'GradeLessonController@gradeLessons')->name('admin_gradeLessons');
			Route::get('/remove/{code}', 'GradeLessonController@remove')->name('admin_gradeLessons_remove');
			Route::get('/add', 'GradeLessonController@addShow')->name('admin_gradeLessons_addShow');
			Route::post('/add', 'GradeLessonController@add')->name('admin_gradeLessons_add');
			Route::get('/edit/{code}', 'GradeLessonController@editShow')->name('admin_gradeLessons_editShow');
			Route::post('/edit/{code}', 'GradeLessonController@edit')->name('admin_gradeLessons_edit');
		});


		Route::prefix('lessons')->group(function()
		{
			Route::get('/', 'LessonController@lessons')->name('admin_lessons');
			Route::get('/remove/{url}', 'LessonController@remove')->name('admin_lessons_remove');
			Route::get('/add', 'LessonController@addShow')->name('admin_lessons_addShow');
			Route::post('/add', 'LessonController@add')->name('admin_lessons_add');
			Route::get('/edit/{url}', 'LessonController@editShow')->name('admin_lessons_editShow');
			Route::post('/edit/{url}', 'LessonController@edit')->name('admin_lessons_edit');
		});


	});

});


Route::get('/test', function()
{

	$gradeLesson = \App\model\GradeLesson::query()->first();

	$code = substr($gradeLesson->code, 2, 4);

	return $code;

});
