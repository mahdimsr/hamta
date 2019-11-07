<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class IndexController extends Controller
    {

        public function index()
        {

            $student = Auth::guard('api')->user();

            $cartCount = Cart::query()->where('studentId', '=', $student->id)->where('transactionId', '=', 0)->count();


            return response()->json(['status'    => ApiHelper::$statusType[ 'ok' ],
                                     'cartCount' => $cartCount,
                                     'student'   => $student]);
        }



    }
