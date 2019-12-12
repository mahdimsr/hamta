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

        Route::namespace('Auth')->prefix('student')->group(function()
        {
            Route::get('/login', 'AuthController@loginForm')->name('student_login_form');
            Route::post('/login', 'AuthController@login')->name('student_login');
            Route::get('/register', 'AuthController@registerForm')->name('student_register_form');
            Route::post('/register', 'AuthController@register')->name('student_register');
            Route::get('/verify', 'AuthController@verifyForm')->name('student_verify_form');
            Route::get('/newPassword', 'AuthController@newPasswordForm')->name('student_newPassword_form');
            Route::post('/forgetPassword', 'AuthController@forgetPassword')->name('student_forgetPassword');
        });

        Route::middleware('auth:student')->namespace('Dashboard')->prefix('student/dashboard')->group(function()
        {
            Route::get('/', 'DashboardController@home')->name('student_dashboard_home');

            Route::prefix('profile')->group(function()
            {
                Route::get('/', 'ProfileController@profileForm')->name('student_dashboard_profile_form');
                Route::post('/update', 'ProfileController@profileUpdate')->name('student_dashboard_profile_update');
                Route::post('/edit', 'ProfileController@profileEdit')->name('student_dashboard_profile_edit');

                Route::prefix('settings')->group(function()
                {
                    Route::get('/', 'ProfileController@profileFormSettings')->name('student_dashboard_profile_form_settings');
                });

            });

            Route::prefix('scholarship')->group(function()
            {
            Route::get('/', 'ScholarshipController@scholarshipForm')->name('student_dashboard_scholarship_form');
            Route::post('/', 'ScholarshipController@scholarship')->name('student_dashboard_scholarship');
            });

            Route::prefix('exams')->group(function()
            {
                Route::get('/purchased', 'DashboardController@purchased')->name('student_dashboard_purchasedExams');
                Route::prefix('lesson')->group(function()
                {
                    Route::get('/', 'LessonExamController@exams')->name('student_dashboard_lessonExams');
                    Route::get('{exm}/cart/add', 'LessonExamController@addToCart')->name('student_dashboard_lessonExams_addToCart');
                    Route::get('{exm}/details', 'LessonExamController@details')->name('student_dashboard_lessonExam_details');
                    Route::get('{exm}/questions', 'LessonExamController@questions')->name('student_dashboard_lessonExams_questions');
                    Route::post('{exm}/result', 'LessonExamController@result')->name('student_dashboard_lessonExams_result');

                });

            });

            Route::prefix('cart')->group(function()
            {
                Route::get('/', 'CartController@cartForm')->name('student_dashboard_cart_form');
                Route::get('/remove/{id}', 'CartController@remove')->name('student_dashboard_cart_remove');
                Route::post('/discount', 'CartController@discount')->name('student_dashboard_cart_discount');
                Route::post('/purchase/wallet', 'CartController@purchaseWallet')->name('student_dashboard_cart_purchaseWallet');
                Route::post('/purchase/bank', 'CartController@purchaseBank')->name('student_dashboard_cart_purchaseBank');
                Route::get('/purchase/bank/verify', 'CartController@purchaseBankVerify')->name('student_dashboard_cart_purchaseBankVerify');
            });

            Route::prefix('wallet')->group(function()
            {
                Route::get('/', 'WalletController@walletForm')->name('student_dashboard_wallet_form');
                Route::post('/charge', 'WalletController@walletCharge')->name('student_dashboard_wallet_charge');
                Route::get('/verify', 'WalletController@walletVerify')->name('student_dashboard_wallet_verify');
            });

            Route::get('/discounts', 'DashboardController@discounts')->name('student_dashboard_discounts');
            Route::get('/transactions', 'DashboardController@transactions')->name('student_dashboard_transactions');
            Route::get('/results', 'DashboardController@results')->name('student_dashboard_results');

            Route::get('/logout', 'DashboardController@logout')->name('student_dashboard_logout');
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


                Route::prefix('/lesson')->group(function()
                {

                    Route::get('/', 'LessonExamController@exams')->name('admin_ltlExams');
                    Route::get('/add', 'LessonExamController@addShow')->name('admin_ltlExams_addShow');
                    Route::get('{exm}/edit', 'LessonExamController@editShow')->name('admin_ltlExams_editShow');
                    Route::post('{exm}/edit', 'LessonExamController@edit')->name('admin_ltlExams_edit');
                    Route::post('/add', 'LessonExamController@add')->name('admin_ltlExams_add');
                    Route::get('{exm}/remove', 'LessonExamController@remove')->name('admin_ltlExams_remove');

                    Route::prefix('{exm}/questions')->group(function()
                    {

                        Route::get('/', 'LessonExamController@questionsShow')->name('admin_ltlExams_questionsShow');
                        Route::get('/add', 'LessonExamController@addQuestionShow')
                             ->name('admin_ltlExams_addQuestionShow');
                        Route::post('/add', 'LessonExamController@addQuestion')->name('admin_ltlExams_addQuestion');
                        Route::get('/edit/{id}', 'LessonExamController@editQuestionShow')
                             ->name('admin_ltlExams_editQuestionShow');
                        Route::post('/edit/{id}', 'LessonExamController@editQuestion')
                             ->name('admin_ltlExams_editQuestion');
                        Route::get('/remove/{id}', 'LessonExamController@removeQuestion')
                             ->name('admin_ltlExams_removeQuestion');
                    });
                });

                Route::prefix('gift')->group(function()
                {

                    Route::get('/', 'GiftExamController@exams')->name('admin_giftExams');
                    Route::get('/add', 'GiftExamController@addShow')->name('admin_giftExams_addShow');
                    Route::post('/add', 'GiftExamController@add')->name('admin_giftExams_add');
                    Route::get('{exm}/edit', 'GiftExamController@editShow')->name('admin_giftExams_editShow');
                    Route::post('{exm}/edit', 'GiftExamController@edit')->name('admin_giftExams_edit');
                    Route::get('{exm}/remove', 'GiftExamController@remove')->name('admin_giftExams_remove');


                    Route::prefix('{exm}/questions')->group(function()
                    {

                        Route::get('/', 'GiftExamController@questionsShow')->name('admin_giftExams_questionsShow');
                        Route::get('/add', 'GiftExamController@addQuestionShow')
                             ->name('admin_giftExams_addQuestionShow');
                        Route::post('/add', 'GiftExamController@addQuestion')->name('admin_giftExams_addQuestion');
                        Route::get('/edit/{id}', 'GiftExamController@editQuestionShow')
                             ->name('admin_giftExams_editQuestionShow');
                        Route::post('/edit/{id}', 'GiftExamController@editQuestion')
                             ->name('admin_giftExams_editQuestion');
                        Route::get('/remove/{id}', 'GiftExamController@removeQuestion')
                             ->name('admin_giftExams_removeQuestion');

                    });

                });
            });


            Route::prefix('discount')->group(function()
            {

                Route::get('/', 'DiscountController@show')->name('admin_codes_show');
                Route::get('/add', 'DiscountController@addShow')->name('admin_discount_addShow');
                Route::post('/add', 'DiscountController@add')->name('admin_discount_add');
                Route::get('/edit/{id}', 'DiscountController@editShow')->name('admin_discount_editShow');
                Route::post('/edit/{id}', 'DiscountController@edit')->name('admin_discount_edit');
                Route::get('/remove/{id}', 'DiscountController@remove')->name('admin_discount_remove');
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

            Route::prefix('categories')->group(function()
            {

                Route::get('/', 'CategoryController@categories')->name('admin_categories');
                Route::get('/remove/{url}', 'CategoryController@remove')->name('admin_categories_remove');
                Route::get('/add', 'CategoryController@addShow')->name('admin_categories_addShow');
                Route::post('/add', 'CategoryController@add')->name('admin_categories_add');
                Route::get('/edit/{url}', 'CategoryController@editShow')->name('admin_categories_editShow');
                Route::post('/edit/{url}', 'CategoryController@edit')->name('admin_categories_edit');

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
                Route::get('/edit/{id}', 'StudentController@editShow')->name('admin_students_editShow');
                Route::post('/edit/{id}', 'StudentController@edit')->name('admin_students_edit');

                Route::prefix('/{id}/discounts')->group(function()
                {

                    Route::get('/', 'StudentController@discounts')->name('admin_students_discounts');
                    Route::get('/add', 'StudentController@discountAddShow')->name('admin_students_discountAddShow');
                    Route::post('/add', 'StudentController@discountAdd')->name('admin_students_discountAdd');
                    Route::get('/edit/{discountId}', 'StudentController@discountEditShow')
                         ->name('admin_students_discountEditShow');
                    Route::post('/edit/{discountId}', 'StudentController@discountEdit')
                         ->name('admin_students_discountEdit');
                    Route::get('/remove/{discountId}', 'StudentController@discountRemove')
                         ->name('admin_students_discountRemove');
                });
            });
        });
    });

