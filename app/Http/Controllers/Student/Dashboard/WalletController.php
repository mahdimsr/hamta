<?php

    namespace App\Http\Controllers\Student\Dashboard;

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
                                       'charge_code'  => 'nullable|string',]);

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

                            return redirect()->route('student_dashboard_wallet_form')->with('status', 'شارژ کیف پول همراه با کد شگفت انگیز با موفقیت انجام شد.');
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

    }
