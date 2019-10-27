<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\Auth;


    class ApiAuthenticate
    {

        /**
         * Handle an incoming request.
         *
         * @param \Illuminate\Http\Request $request
         * @param \Closure                 $next
         *
         * @return mixed
         */
        public function handle($request, Closure $next)
        {

            if (!Auth::guard('api'))
            {
                return response()->json(['status' => 'unAuth'],401);
            }


            return $next($request);
        }

    }
