<?php

    namespace App\Http\Controllers\Student\Dashboard;

    use App\model\Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\model\Discount;
    use App\model\Transaction;
    use App\Lib\zarinpal;
    use nusoap_client;
    use Illuminate\Support\Facades\Auth;


    class WalletController extends Controller
    {

        public function walletForm()
        {

            $student = Auth::guard('student')->user();

            return view('student.dashboard.wallet.form', compact('student'));
        }


        public function walletCharge(Request $request)
        {

            $student = Auth::guard('student')->user();

            $this->validate($request, ['charge_value' => 'required|numeric|min:1000',
                                       'charge_code'  => 'nullable|string|exists:discount,code',]);

            $price = $request->input('charge_value');

            if ($request->get('charge_code') != null)
            {
                $discount_code = Discount::query()->where('code', $request->input('charge_code'))->first();

                if ($discount_code->generalChargeIsValid())
                {

                        $discountPrice = $price + ($price*$discount_code->value)/100;
                        $order         = new zarinpal();

                        $res= $order->pay($price, 'همپا | شارژ کیف پول', $student->email, $student->mobile, route('student_dashboard_wallet_verify'));

                        if ($res)
                        {
                            $transaction                = new Transaction();
                            $transaction->type          = 'CHARGE';
                            $transaction->studentId     = $student->id;
                            $transaction->price         = $price;
                            $transaction->discountId    = $discount_code->id;
                            $transaction->discountPrice = $discountPrice;
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
                    return redirect()->back()->withErrors(['charge_code' => ['کد شگفت انگیز وارد شده معتبر نیست.']])->withInput($request->all());
                }
            }

            else
            {
                $order = new zarinpal();
                $res= $order->pay($price, 'همپا | شارژ کیف پول', $student->email, $student->mobile, route('student_dashboard_wallet_verify'));

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


        public function walletVerify(Request $request)
        {

            $student     = Auth::guard('student')->user();
            $MerchantID  = '6e70bb64-8e33-11e8-a395-005056a205be';
            $Authority   = $request->get('Authority');
            $transaction = Transaction::query()->where('studentId', $student->id)->where('status', 'IN-PROGRESS')->where('code', $Authority)->first();

            if ($transaction)
            {
                if ($request->get('Status') == 'OK')
                {
                    $client                   = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
                    $client->soap_defencoding = 'UTF-8';


                    $result = $client->call('PaymentVerification', [['MerchantID' => $MerchantID,
                                                                     'Authority'  => $Authority,
                                                                     'Amount'     => $transaction->price,],]);

                    if ($result[ 'Status' ] == 100)
                    {

                        if ($transaction->discountPrice)
                        {
                            $student->wallet += $transaction->discountPrice;
                            $student->update();
                            $transaction->code   = ltrim($Authority, '0');
                            $transaction->status = 'SUCCESS';
                            $transaction->update();

                            return redirect()
                                ->route('student_dashboard_wallet_form')
                                ->with('status', 'شارژ کیف پول همراه با کد شگفت انگیز با موفقیت انجام شد.');
                        }

                        else
                        {
                            $student->wallet += $transaction->price;
                            $student->update();
                            $transaction->code   = ltrim($Authority, '0');
                            $transaction->status = 'SUCCESS';
                            $transaction->update();

                            return redirect()->route('student_dashboard_wallet_form')->with('status', 'شارژ کیف پول با موفقیت انجام شد.');
                        }

                    }

                    else
                    {
                        $transaction->code   = ltrim($Authority, '0');
                        $transaction->status = 'FAILED';
                        $transaction->update();

                        return redirect()->route('student_dashboard_wallet_form')->withErrors(['transactionFailed' => ['شارژ کیف پول ناموفق']]);
                    }
                }

                else
                {
                    $transaction->code   = ltrim($Authority, '0');
                    $transaction->status = 'FAILED';
                    $transaction->update();

                    return redirect()->route('student_dashboard_wallet_form')->withErrors(['transactionFailed' => ['شارژ کیف پول ناموفق']]);
                }
            }

            else
            {
                return redirect()->route('student_dashboard_wallet_form');
            }

        }


        public function walletPurchaseLessonExam(Request $request)
        {

            $student = Auth::guard('student')->user();

            $carts = Cart::query()->where('studentId', $student->id)->where('transactionId', 0)->get();

            $price = 0;

            foreach ($carts as $cart)
            {
                $price += $cart->lessonExam->price;
            }

            //check discount code
            if ($request->input('discountCode') != null)
            {
                $discount = Discount::query()->where('code', $request->input('discountCode'))->first();

                // check discount validation
                if ($discount && $discount->isValid())
                {

                    $discountPrice = $price*((100 - $discount->value)/100);

                    //payment

                    $order = new zarinpal();

                    $res= $order->pay($discountPrice, 'همپا | خرید آزمون', $student->email, $student->mobile, route('student_dashboard_wallet_purchaseLessonExamVerify'));

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
                        return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
                    }
                }
                else
                {
                    return redirect()->back()->withErrors(['charge_code' => ['کد تخفیف وارد شده معتبر نیست.']]);
                }
            }
            else
            {
                //payment

                $order = new zarinpal();

                $res= $order->pay($price, 'همپا | خرید آزمون', $student->email, $student->mobile, route('student_dashboard_wallet_purchaseLessonExamVerify'));

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
                    return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
                }
            }

        }

        public function walletPurchaseLessonExamVerify(Request $request)
        {

            $student     = Auth::guard('student')->user();
            $MerchantID  = '6e70bb64-8e33-11e8-a395-005056a205be';
            $Authority   = $request->get('Authority');
            $transaction = Transaction::query()->where('studentId', $student->id)->where('status', 'IN-PROGRESS')->where('code', $Authority)->first();
            $carts = Cart::query()->where('studentId', $student->id)->where('transactionId', 0)->get();

            if ($transaction)
            {
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
                                $lessonExam = $cart->lessonExam();

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
                            return redirect()->route('student_dashboard_transactions')->with('status', 'خرید آزمون همراه با کد تخفیف با موفقیت انجام شد.');
                        }

                        else
                        {
                            $transaction->code   = ltrim($Authority, '0');
                            $transaction->status = 'SUCCESS';
                            $transaction->update();

                            foreach($carts as $cart)
                            {
                                $lessonExam = $cart->lessonExam();

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
                            return redirect()->route('student_dashboard_transactions')->with('status', 'خرید آزمون با موفقیت انجام شد.');
                        }

                    }

                    else
                    {
                        $transaction->code   = ltrim($Authority, '0');
                        $transaction->status = 'FAILED';
                        $transaction->update();

                        return redirect()->route('student_dashboard_lessonExams_purchaseForm')->withErrors(['transactionFailed' => ['خرید آزمون ناموفق']]);
                    }
                }

                else
                {
                    $transaction->code   = ltrim($Authority, '0');
                    $transaction->status = 'FAILED';
                    $transaction->update();

                    return redirect()->route('student_dashboard_lessonExams_purchaseForm')->withErrors(['transactionFailed' => ['خرید آزمون ناموفق']]);
                }
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams_purchaseForm');
            }

        }

    }
