<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use App\model\Discount;
    use App\model\Transaction;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class CartController extends Controller
    {


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

            $student = Auth::guard('api')->user();
            $cart    = Cart::query()->find($request->input('cartId'));

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
                                         'errorMessage' => 'مشکلی در سامانه پیش آمده.']);
            }


        }


        public function purchase(Request $request)
        {

            $student = Auth::user();

            $carts = Cart::query()->whereIn('id', [$request->cartId])->get();


            if ($request->has('discountCode'))
            {
                $price = 0;

                return 'no discount code';
            }
            else
            {
                $price = 0;

                foreach ($carts as $cart)
                {
                    $price = $cart->lessonExam->price + $price;

                }

                if ($student->wallet >= $price)
                {
                    foreach ($carts as $cart)
                    {
                        $transaction = new Transaction();

                        $transaction->type     = 'PURCHASE';
                        $transaction->itemType = 'LESSON_EXAM';
                        $transaction->price    = $cart->lessonExam->price;
                        $transaction->status   = 'SUCCESS';

                        $transaction->save();

                        $cart->transactionId = $transaction->id;
                        $cart->update();
                    }


                    $student->wallet = $student->wallet - $price;
                    $student->update();

                    return response()->json(['status'  => ApiHelper::$statusType[ 'ok' ],
                                             'student' => $student]);
                }
                else
                {
                    return response()->json(['status'       => ApiHelper::$statusType[ 'error' ],
                                             'errorMessage' => 'اعتبار کیف پول شما کافی نیست.']);
                }


            }
        }


        public function transactions()
        {

            $student = Auth::user();

            $transactions = Transaction::query()
                                       ->where('studentId', $student->id)
                                       ->where('itemType', '=', 'LESSON_EXAM')
                                       ->get();

            $customData = [];

            foreach ($transactions as $transaction)
            {
                $item[ 'code' ] = $transaction->code;

                if ($transaction->discountId)
                {
                    $item[ 'price' ] = $transaction->descountPrice;
                }
                else
                {
                    $item[ 'price' ] = $transaction->price;
                }

                if ($transaction->type == 'PURCHASE')
                {
                    $item[ 'persian_itemType' ] = 'خرید آزمون درس به درس';
                }
                elseif ($transaction->type == 'CHARGE')
                {
                    $item[ 'persian_itemType' ] = 'شارژ کیف پول';
                }

                array_push($customData, $item);
            }

            return response()->json(['status'       => ApiHelper::$statusType[ 'ok' ],
                                     'transactions' => $customData]);
        }

    }
