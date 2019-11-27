<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class IndexController extends Controller
    {

        public function checkUpdate(Request $request)
        {

            $version     = '1.0';
            $title       = 'نسخه اول';
            $message
                         = 'این نسخه اولین انتشار اپلیکیشن سامانه است و امکان داره که مشکلاتی داشته باشه. از بابت مشلات پیش آمده معذرت میخواهیم و در اولین فرصت سعی میکنیم که برطرفشون کنیم.';
            $hasUpdate   = false;
            $forceUpdate = false;

            return response()->json(['status'      => ApiHelper::$statusType[ 'ok' ],
                                     'version'     => $version,
                                     'title'       => $title,
                                     'message'     => $message,
                                     'hasUpdate'   => $hasUpdate,
                                     'forceUpdate' => $forceUpdate]);
        }


        public function index()
        {

            $student = Auth::guard('api')->user();

            $cartCount = Cart::query()->where('studentId', '=', $student->id)->where('transactionId', '=', 0)->count();


            return response()->json(['status'    => ApiHelper::$statusType[ 'ok' ],
                                     'cartCount' => $cartCount,
                                     'student'   => $student]);
        }


    }
