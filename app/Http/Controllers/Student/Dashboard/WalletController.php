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
	public function wallet()
	{
		$student = Auth::guard('student')->user();
		return view('student.dashboard.wallet.wallet',compact('student'));
    }

    public function charge(Request $request)
    {
        $student = Auth::guard('student')->user();

        $this->validate($request,[
            'price' => 'required|numeric|min:1000',
            'code'  => 'nullable|string|exists:discount,code',
        ]);

        $price = $request->input('price');

        if($request->get('code')!=null)
        {
            $discount_code= Discount::query()->where('code',$request->input('code'))->first();

            if($discount_code->type=='GENERAL-CHARGE')
            {

                if($discount_code->isExpired)
                {
                    return redirect()->back()->withErrors(['codeExpired' => ['کد منقضی شده است.']]);
                }

                else
                {
                    $discountPrice = $price + ($price * $discount_code->value)/100;
                    $order = new zarinpal();
                    $res = $order->pay($price,'همپا | شارژ کیف پول',$student->email,$student->mobile,route('student_wallet_verify'));

                    if($res)
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
                        $transaction->status='FAILED';
                        $transaction->update();
                        return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
                    }

                }

            }

            else
            {
                return redirect()->back()->withErrors(['codeIncorrect' => ['کد وارد شده قابل استفاده برای این بخش نیست']]);
            }
        }

        else
        {
            $order = new zarinpal();
            $res = $order->pay($price,'ممپا | شارژ کیف پول',$student->email,$student->mobile,route('student_wallet_verify'));

            if($res)
            {
                $transaction                = new Transaction();
                $transaction->type          = 'CHARGE';
                $transaction->studentId     = $student->id;
                $transaction->price         = $price;
                $transaction->code          = $res;
                $transaction->save();
                return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);
            }

            else
            {
                $transaction->status='FAILED';
                $transaction->update();
                return redirect()->back()->withErrors(['chargeFailed' => ['خطا در اتصال به درگاه']]);
            }

         }
    }

    public function verify(Request $request)
    {
        $student     = Auth::guard('student')->user();
        $MerchantID  = '6e70bb64-8e33-11e8-a395-005056a205be';
        $Authority   = $request->get('Authority') ;
        $transaction = Transaction::query()->where('studentId',$student->id)->where('status','IN-PROGRESS')->where('code',$Authority)->first();

        if($transaction)
        {
            if ($request->get('Status') == 'OK')
            {
                $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
                $client->soap_defencoding = 'UTF-8';


                $result = $client->call('PaymentVerification', [
                    [
                        'MerchantID'     => $MerchantID,
                        'Authority'      => $Authority,
                        'Amount'         => $transaction->price,
                    ],
                ]);

                if ($result['Status'] == 100)
                {

                    if($transaction->discountPrice)
                    {
                        $student->wallet+=$transaction->discountPrice;
                        $student->update();
                        $transaction->status ='SUCCESS';
                        $transaction->update();
                        return redirect()->route('student_wallet')->with('status','شارژ کیف پول شما با موفقیت انجام شد')->with('discount','کد شگفت انگیز برای شارژ شما اعمال گردید');
                    }

                    else
                    {
                        $student->wallet+=$transaction->price;
                        $student->update();
                        $transaction->status ='SUCCESS';
                        $transaction->update();
                        return redirect()->route('student_wallet')->with('status','success');
                    }

                }

                else
                {
                    $transaction->status='FAILED';
                    $transaction->update();
                    return redirect()->route('student_wallet')->withErrors(['transactionFailed' => ['عملیات ناموفق']]);
                }
            }

            else
            {
                $transaction->status='FAILED';
                $transaction->update();
                return redirect()->route('student_wallet')->withErrors(['transactionFailed' => ['عملیات ناموفق']]);
            }
        }

        else
        {
            return redirect()->route('student_wallet');
        }

    }
}
