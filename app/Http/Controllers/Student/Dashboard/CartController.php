<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\model\Cart;
use App\model\Discount;
use App\model\Transaction;
use Illuminate\Http\Request;
use App\Lib\zarinpal;
use nusoap_client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartForm()
    {
        $student = Auth::guard('student')->user();
        $carts = Cart::query()->where('studentId', $student->id)->where('transactionId',0)->get();
        $price = 0;

        foreach ($carts as $cart)
        {
            $price += $cart->lessonExam->price;
        }

        return view('student.dashboard.cart.form', compact('student', 'price'));
    }

    public function remove($id)
    {
        $student = Auth::guard('student')->user();
        $cartItem = Cart::query()->where('id', $id)->where('studentId',$student->id)->first();

        if($cartItem)
        {
            $cartItem->delete();
        }

        return redirect()->route('student_dashboard_cart_form');
    }

    public function discount(Request $request)
    {
        $student       = Auth::guard('student')->user();
        $result        = [];
        $discount      = Discount::query()->where('code', $request->input('discountCode'))->first();
        $carts         = Cart::query()->where('studentId', $student->id)->where('transactionId',0)->get();
        $numberofExams = count($carts);

        if ($discount)
        {
            $usable = $discount->usable();
            if ($discount->isValid() && $usable >= $numberofExams)
            {
                $result[ 'status' ]         = 'success';
                $result[ 'successMessage' ] = 'کد تخفیف وارد شده معتبر است.';
                $result[ 'discountCode' ]   = $discount;
            }

            else if($usable < $numberofExams)
            {
                $result[ 'status' ]       = 'error';
                $result[ 'errorMessage' ] = 'این کد تخفیف فقط برای ' . $usable . ' آزمون دیگر قابل استفاده است.';
            }

            else
            {
                $result[ 'status' ]       = 'error';
                $result[ 'errorMessage' ] = 'کد تخفیف وارد شده معتبر نیست.';
            }

            return $result;
        }

        else
        {
            $result[ 'status' ]       = 'error';
            $result[ 'errorMessage' ] = 'کد تخفیف وارد شده معتبر نیست.';
            return $result;
        }

    }


    public function purchaseWallet(Request $request)
    {
        $student       = Auth::guard('student')->user();
        $carts         = Cart::query()->where('studentId', $student->id)->where('transactionId',0)->get();
        $numberofExams = count($carts);

        if(!$carts->isEmpty())
        {
            $price = 0;
            foreach ($carts as $cart)
            {
                $price += $cart->lessonExam->price;
            }

            if ($request->input('discountCode') != null)
            {
                $discount = Discount::query()->where('code', $request->input('discountCode'))->first();
                if ($discount && $discount->isValid())
                {
                    $usable = $discount->usable();
                    if($usable >= $numberofExams)
                    {
                        $discountPrice = $price*((100 - $discount->value)/100);
                        if ($student->wallet >= $discountPrice)
                        {
                            foreach($carts as $cart)
                            {
                                $lessonExam                       = $cart->lessonExam;
                                $cart_transaction                 = new Transaction();
                                $cart_transaction->type           = 'PURCHASE';
                                $cart_transaction->studentId      = $student->id;
                                $cart_transaction->itemId         = $lessonExam->id;
                                $cart_transaction->itemType       = 'LESSON_EXAM';
                                $cart_transaction->price          = $lessonExam->price;
                                $cart_transaction->discountId     = $discount->id;
                                $cart_transaction->discountPrice  = $lessonExam->price*((100 - $discount->value)/100);
                                $cart_transaction->status         = 'SUCCESS';
                                $cart_transaction->save();
                                $cart->setTransaction($cart_transaction->id)->with('tab','purchase');
                            }

                            $student->wallet = $student->wallet - $discountPrice;
                            $student->update();
                            return redirect()->route('student_dashboard_transactions');
                        }

                        else
                        {
                            return redirect()->back()->withErrors(['notEnoughCharge'=>'شارژ کیف پول شما برای خرید کافی نیست.']);
                        }

                    }

                    else
                    {
                        $message = 'این کد تخفیف فقط برای ' . $usable . 'آزمون دیگر قابل استفاده است.';
                        return redirect()->back()->withErrors(['discountUsability' => $message]);
                    }

                }

                else
                {
                    return redirect()->back()->withErrors(['invalidDiscountCode'=>'کد تخفیف وارد شده معتبر نیست.']);
                }

            }

            else
            {

                if ($student->wallet >= $price)
                {
                    foreach($carts as $cart)
                    {
                        $lessonExam                       = $cart->lessonExam;
                        $cart_transaction                 = new Transaction();
                        $cart_transaction->type           = 'PURCHASE';
                        $cart_transaction->studentId      = $student->id;
                        $cart_transaction->itemId         = $lessonExam->id;
                        $cart_transaction->itemType       = 'LESSON_EXAM';
                        $cart_transaction->price          = $lessonExam->price;
                        $cart_transaction->status         = 'SUCCESS';
                        $cart_transaction->save();
                        $cart->setTransaction($cart_transaction->id);
                    }

                    $student->wallet = $student->wallet - $price;
                    $student->update();
                    return redirect()->route('student_dashboard_transactions')->with('tab','purchase');
                }

                else
                {
                    return redirect()->back()->withErrors(['notEnoughCharge'=>'شارژ کیف پول شما برای خرید کافی نیست.']);
                }

            }
        }

        else
        {
            return redirect()->route('student_dashboard_cart_form');
        }
    }

    public function purchaseBank(Request $request)
    {

        $student       = Auth::guard('student')->user();
        $carts         = Cart::query()->where('studentId', $student->id)->where('transactionId', 0)->get();
        $numberofExams = count($carts);

        if(!$carts->isEmpty())
        {
            $price = 0;
            foreach ($carts as $cart)
            {
                $price += $cart->lessonExam->price;
            }

            if ($request->input('discountCode') != null)
            {
                $discount = Discount::query()->where('code', $request->input('discountCode'))->first();
                if ($discount && $discount->isValid())
                {
                    $usable = $discount->usable();
                    if($usable >= $numberofExams)
                    {
                        $discountPrice = $price*((100 - $discount->value)/100);

                        $order = new zarinpal();
                        $res   = $order->pay($discountPrice, 'همپا | خرید آزمون', $student->email, $student->mobile, route('student_dashboard_cart_purchaseBankVerify'));

                        if ($res)
                        {
                            $transaction                = new Transaction();
                            $transaction->type          = 'CHARGE';
                            $transaction->studentId     = $student->id;
                            $transaction->price         = $discountPrice;
                            $transaction->discountId    = $discount->id;
                            $transaction->code          = $res;
                            $transaction->save();
                            return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                        }

                        else
                        {
                            return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']])->withInput($request->all());
                        }

                    }

                    else
                    {
                        $message = 'این کد تخفیف فقط برای ' . $usable . ' آزمون دیگر قابل استفاده است.';
                        return redirect()->back()->withErrors(['discountUsability' => $message])->withInput($request->all());
                    }

                }

                else
                {
                    return redirect()->back()->withErrors(['invalidDiscountCode' => ['کد تخفیف وارد شده معتبر نیست.']])->withInput($request->all());
                }

            }

            else
            {

                $order = new zarinpal();
                $res   = $order->pay($price, 'همپا | خرید آزمون', $student->email, $student->mobile, route('student_dashboard_cart_purchaseBankVerify'));

                if ($res)
                {
                    $transaction            = new Transaction();
                    $transaction->type      = 'CHARGE';
                    $transaction->studentId = $student->id;
                    $transaction->price     = $price;
                    $transaction->code      = $res;
                    $transaction->save();
                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                }

                else
                {
                    return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']])->withInput($request->all());
                }

            }
        }

        else
        {
            return redirect()->route('student_dashboard_cart_form');
        }

    }

    public function purchaseBankVerify(Request $request)
    {

        $student     = Auth::guard('student')->user();
        $MerchantID  = '6e70bb64-8e33-11e8-a395-005056a205be';
        $Authority   = $request->get('Authority');
        $transaction = Transaction::query()->where('studentId', $student->id)->where('status', 'IN-PROGRESS')->where('code', $Authority)->first();

        if ($transaction)
        {
            $carts = Cart::query()->where('studentId', $student->id)->where('transactionId', 0)->get();
            if ($request->get('Status') == 'OK')
            {
                $client                   = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
                $client->soap_defencoding = 'UTF-8';

                    $result = $client->call('PaymentVerification', [['MerchantID' => $MerchantID,
                    'Authority'  => $Authority,
                    'Amount'     => $transaction->price,],]);

                if ($result[ 'Status' ] == 100)
                {
                    if ($transaction->discountId)
                    {
                        $discount   = $transaction->discount;
                        foreach($carts as $cart)
                        {
                            $lessonExam                       = $cart->lessonExam;
                            $cart_transaction                 = new Transaction();
                            $cart_transaction->type           = 'PURCHASE';
                            $cart_transaction->studentId      = $student->id;
                            $cart_transaction->itemId         = $lessonExam->id;
                            $cart_transaction->itemType       = 'LESSON_EXAM';
                            $cart_transaction->price          = $lessonExam->price;
                            $cart_transaction->discountId     = $discount->id;
                            $cart_transaction->discountPrice  = $lessonExam->price*((100 - $discount->value)/100);
                            $cart_transaction->status         = 'SUCCESS';
                            $cart_transaction->save();
                            $cart->setTransaction($cart_transaction->id);
                        }

                        $transaction->code       = ltrim($Authority, '0');
                        $transaction->status     = 'SUCCESS';
                        $transaction->discountId = null;
                        $transaction->update();
                        return redirect()->route('student_dashboard_transactions')->with('status', 'خرید آزمون همراه با کد تخفیف با موفقیت انجام شد.')->with('tab','purchase');
                    }

                    else
                    {
                        foreach($carts as $cart)
                        {
                            $lessonExam                  = $cart->lessonExam;
                            $cart_transaction            = new Transaction();
                            $cart_transaction->type      = 'PURCHASE';
                            $cart_transaction->itemId    = $lessonExam->id;
                            $cart_transaction->itemType  = 'LESSON_EXAM';
                            $cart_transaction->studentId = $student->id;
                            $cart_transaction->price     = $lessonExam->price;
                            $cart_transaction->status    = 'SUCCESS';
                            $cart_transaction->save();
                            $cart->setTransaction($cart_transaction->id);
                        }

                        $transaction->code   = ltrim($Authority, '0');
                        $transaction->status = 'SUCCESS';
                        $transaction->update();
                        return redirect()->route('student_dashboard_transactions')->with('status', 'خرید آزمون با موفقیت انجام شد.')->with('tab','purchase');
                    }

                }

                else
                {
                    $transaction->code   = ltrim($Authority, '0');
                    $transaction->status = 'FAILED';
                    $transaction->discountId = null;
                    $transaction->update();
                    return redirect()->route('student_dashboard_cart_form')->withErrors(['transactionFailed' => ['خرید آزمون ناموفق']]);
                }

            }

            else
            {
                $transaction->code   = ltrim($Authority, '0');
                $transaction->status = 'FAILED';
                $transaction->discountId = null;
                $transaction->update();
                return redirect()->route('student_dashboard_cart_form')->withErrors(['transactionFailed' => ['خرید آزمون ناموفق']]);
            }

        }

        else
        {
            return redirect()->route('student_dashboard_cart_form');
        }

    }
}
