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

        Route::namespace('Auth')->prefix('students')->group(function()
        {

            Route::get('/login', 'AuthController@showlogin')->name('student_login_show');
            Route::post('/login', 'AuthController@login')->name('student_login');
            Route::get('/register', 'AuthController@showregister')->name('student_register_show');
            Route::get('/verify', 'AuthController@verify')->name('student_verify_show');
            Route::post('/register', 'AuthController@register')->name('student_register');
            Route::get('/logout', 'AuthController@logout')->name('student_logout');
        });
        Route::middleware('auth:student')->namespace('Dashboard')->prefix('student/dashboard')->group(function()
        {

            Route::get('/profile', 'ProfileController@profile')->name('student_dashboard_profile');
            Route::post('/profile', 'ProfileController@update')->name('student_dashboard_profile_update');
            Route::post('/profileEdit', 'ProfileController@edit')->name('student_dashboard_profile_edit');
            Route::get('/scholarship', 'ScholarshipController@scholarship')->name('student_dashboard_scholarship');
            Route::post('/scholarship', 'ScholarshipController@submit')->name('student_dashboard_scholarship_submit');
            Route::prefix('exams')->group(function()
            {

                Route::get('/', 'ExamController@exams')->name('student_dashboard_exams');
                Route::prefix('lessonToLesson')->group(function()
                {

                    Route::get('/', 'LessonExamController@exams')->name('student_dashboard_lessonExams');
                    Route::get('/questions', 'LessonExamController@questions')
                         ->name('student_dashboard_lessonExams_questions');
                });
            });
            Route::prefix('cart')->group(function()
            {

                Route::get('/', 'CartController@cart')->name('student_cart');
            });
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
                Route::get('/remove/{username}', 'RegisterController@remove')->name('admin_admins_remove');
            });
            Route::prefix('exams')->group(function()
            {

                Route::get('/', 'DashboardController@exams')->name('admin_exams');
                Route::prefix('/lessonToLesson')->group(function()
                {

                    Route::get('/', 'LessonExamController@exams')->name('admin_ltl_exams');
                    Route::get('/add', 'LessonExamController@addShow')->name('admin_ltlExams_addShow');
                    Route::get('/edit/{exm}', 'LessonExamController@editShow')->name('admin_ltlExams_editShow');
                    Route::post('/edit/{exm}', 'LessonExamController@edit')->name('admin_ltlExams_edit');
                    Route::post('/add', 'LessonExamController@add')->name('admin_lExam_add');
                    Route::get('/remove/{exm}', 'LessonExamController@remove')->name('admin_lExam_remove');

                    Route::prefix('/questions')->group(function()
                    {

                        Route::get('/{exm}', 'LessonExamController@questionsShow')->name('admin_lExam_questionsShow');
                        Route::get('/add/{exm}', 'LessonExamController@addQuestionShow')->name('admin_lExam_addQuestionShow');
                        Route::post('/add/{exm}', 'LessonExamController@addQuestion')->name('admin_lExam_addQuestion');
                        Route::get('/edit/{exm}/{id}', 'LessonExamController@editQuestionShow')->name('admin_ltlExams_editQuestionShow');
                        Route::post('/edit/{exm}/{id}', 'LessonExamController@editQuestion')->name('admin_ltlExams_editQuestion');
                        Route::get('/remove/{id}', 'LessonExamController@removeQuestion')->name('admin_lExam_removeQuestion');
                    });
                });
            });
            Route::prefix('questions')->group(function()
            {

                Route::get('/addShow/{exm?}', 'QuestionController@addShow')->name('show_addQuestion');
                Route::post('/add', 'QuestionController@add')->name('addQuestion');
                Route::get('/list', 'QuestionController@questions')->name('admin_questions');
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
            Route::prefix('scholarships')->group(function()
            {

                Route::get('/', 'ScholarshipController@scholarships')->name('admin_scholarships');
                Route::get('/show/{url}', 'ScholarshipController@show')->name('admin_scholarships_show');
                Route::post('/answer/{url}', 'ScholarshipController@answer')->name('admin_scholarships_answer');
            });
            Route::prefix('students')->group(function()
            {

                Route::get('/', 'StudentController@students')->name('admin_students');
                Route::get('/add', 'StudentController@addShow')->name('admin_students_addShow');
                Route::post('/add', 'StudentController@add')->name('admin_students_add');
                Route::get('/edit/{id}', 'StudentController@editShow')->name('admin_students_editShow');
                Route::post('/edit/{id}', 'StudentController@edit')->name('admin_students_edit');
            });
        });
    });

    Route::get('/test', function()
    {

        $lessonExam = \App\model\LessonExam::query()->with('gradeLessons')->find(4);

        $gradeLessons = \App\model\GradeLesson::all();


        return $lessonExam->lessons();



    })->name('test');
