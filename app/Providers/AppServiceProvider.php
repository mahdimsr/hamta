<?php

    namespace App\Providers;

    use App\model\Cart;
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

            //
            view()->composer('*', function($view)
            {
                $view->with('adminUser', Auth::guard('admin')->user());
            });

            view()->composer('*', function($view)
            {
                $view->with('student', Auth::guard('student')->user());
            });


            view()->composer('*', function($view)
            {

                $authId = Auth::guard('student')->id();
                $cart   = Cart::query()->where('studentId', $authId)->where('transactionId',0)->get();
                $view->with('cart', $cart);
            });

        }

    }
