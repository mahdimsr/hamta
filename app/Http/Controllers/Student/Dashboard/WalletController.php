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

                if ($discount_code->type == 'GENERAL-CHARGE')
                {

                    if ($discount_code->isExpired)
                    {
                        return redirect()->back()->withErrors(['charge_code' => ['کد مورد نظر منقضی شده است.']]);
                    }

                    else
                    {
                        $discountPrice = $price + ($price*$discount_code->value)/100;
                        $order         = new zarinpal();

                        $res
                            = $order->pay($price, 'همپا | شارژ کیف پول', $student->email, $student->mobile, route('student_dashboard_wallet_verify'));

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
                            return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
                        }

                    }

                }

                else
                {
                    return redirect()
                        ->back()
                        ->withErrors(['charge_code' => ['کد وارد شده برای این بخش قابل استفاده نیست.']]);
                }
            }

            else
            {
                $order = new zarinpal();
                $res
                       = $order->pay($price, 'همپا | شارژ کیف پول', $student->email, $student->mobile, route('student_dashboard_wallet_verify'));

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


        public function walletVerify(Request $request)
        {

            $student     = Auth::guard('student')->user();
            $MerchantID  = '6e70bb64-8e33-11e8-a395-005056a205be';
            $Authority   = $request->get('Authority');
            $transaction = Transaction::query()
                                      ->where('studentId', $student->id)
                                      ->where('status', 'IN-PROGRESS')
                                      ->where('code', $Authority)
                                      ->first();

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

                            return redirect()
                                ->route('student_dashboard_wallet_form')
                                ->with('status', 'شارژ کیف پول با موفقیت انجام شد.');
                        }

                    }

                    else
                    {
                        $transaction->code   = ltrim($Authority, '0');
                        $transaction->status = 'FAILED';
                        $transaction->update();

                        return redirect()
                            ->route('student_dashboard_wallet_form')
                            ->withErrors(['transactionFailed' => ['شارژ کیف پول ناموفق']]);
                    }
                }

                else
                {
                    $transaction->code   = ltrim($Authority, '0');
                    $transaction->status = 'FAILED';
                    $transaction->update();

                    return redirect()
                        ->route('student_dashboard_wallet_form')
                        ->withErrors(['transactionFailed' => ['شارژ کیف پول ناموفق']]);
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

            $carts = Cart::query()->where('studentId', $student->id)->whereIn('transactionId', [0])->get();

            $price = 0;

            foreach ($carts as $cart)
            {
                $price += $cart->lessonExam->price;
            }

            //check discount code
            if ($request->input('discountCode') != null)
            {
                $discount = Discount::query()->where('code', $request->input('discountCode'));

                // check discount validation
                if ($discount->exists() && $discount->first()->isValid())
                {

                    $discountCode = $discount->first();

                    $discountPrice = $price*((100 - $discountCode->value)/100);

                    //payment

                    $zarinpalPrice = $discountPrice;

                    $order = new zarinpal();

                    $res
                        = $order->pay($zarinpalPrice, 'همپا | خرید آزمون', $student->email, $student->mobile, route('student_dashboard_wallet_verify'));

                    $transaction = new Transaction();

                    if ($res)
                    {
                        $transaction->type          = 'PURCHASE';
                        $transaction->studentId     = $student->id;
                        $transaction->itemType      = 'LESSON_EXAM';
                        $transaction->price         = $price;
                        $transaction->discountId    = $discountCode->id;
                        $transaction->discountPrice = $discountPrice;
                        $transaction->code          = $res;
                        $transaction->save();

                        return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                    }
                    else
                    {
                        $transaction->status = 'FAILED';
                        $transaction->update();

                        return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
                    }
                }
                else
                {
                    return 'not valid discount code';
                }
            }
            else
            {
                //payment

                $order = new zarinpal();

                $zarinpalPrice = $price;

                $res
                    = $order->pay($zarinpalPrice, 'همپا | خرید آزمون', $student->email, $student->mobile, route('student_dashboard_wallet_verify'));

                $transaction = new Transaction();
                $transaction->type      = 'PURCHASE';
                $transaction->studentId = $student->id;
                $transaction->itemType  = 'LESSON_EXAM';
                $transaction->price     = $price;
                $transaction->code      = $res;

                if ($res)
                {

                    $transaction->status    = 'SUCCESS';
                    $transaction->save();

                    foreach ($carts as $cart)
                    {
                        $cart->setTransaction($transaction);
                    }

                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
                }
                else
                {
                    $transaction->status = 'FAILED';
                    $transaction->save();

                    return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
                }
            }

        }

    }
