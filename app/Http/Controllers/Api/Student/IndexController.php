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


        public function cart()
        {

            $student = Auth::guard('api')->user();
            $cart    = Cart::query()
                           ->where('studentId', '=', $student->id)
                           ->where('transactionId', '=', 0)
                           ->with('lessonExam')
                           ->get();

            return response()->json(['status' => ApiHelper::$statusType[ 'ok' ],
                                     'carts'  => $cart]);

        }


        public function removeCartItem(Request $request)
        {

            $student   = Auth::guard('api')->user();
            $cart      = Cart::query()->find($request->input('cartId'));

            try
            {
                $cart->delete();

                return response()->json(['status'       => ApiHelper::$statusType[ 'ok' ],
                                         'isCartRemove' => true,]);

            }
            catch (\Exception $e)
            {
                return response()->json(['status'       => ApiHelper::$statusType[ 'error' ],
                                         'isCartRemove' => false,
                                         'errorMessage'    => 'مشکلی در سامانه پیش آمده.']);
            }


        }

    }
