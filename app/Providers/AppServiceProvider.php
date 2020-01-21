<?php

    namespace App\Providers;

    use App\model\Cart;
use App\model\Scholarship;
use App\model\StudentCode;
use App\model\Transaction;
use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\Auth;


    class AppServiceProvider extends ServiceProvider
    {

        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }


        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {

            view()->composer('*', function($view)
            {

                if (Auth::guard('student')->check())
                {
                    $authId             = Auth::guard('student')->id();
                    $discountNumbers    = 0;
                    $cart               = Cart::query()->where('studentId', $authId)->where('transactionId',0)->get();
                    $purchasedExams     = Transaction::query()->where('studentId',$authId)->where('type','PURCHASE')->where('itemType','LESSON_EXAM')->where('status','SUCCESS')->get();
                    $studentCodes       = StudentCode::query()->where('studentId',$authId)->get();
                    $scholarship        = Scholarship::query()->where('studentId',$authId)->first();

                    foreach($studentCodes as $studentCode)
                    {
                        if(!$studentCode->discount->isExpired)
                            $discountNumbers++;
                    }

                    $view->with('cart', $cart);
                    $view->with('discountNumbers', $discountNumbers);
                    $view->with('scholarship', $scholarship);
                    $view->with('examNumbers', count($purchasedExams));
                    $view->with('student', Auth::guard('student')->user());
                }

                if (Auth::guard('admin')->check())
                {
                    $view->with('adminUser', Auth::guard('admin')->user());
                }

            });

        }

    }
