<?php

    namespace App\Http\Controllers\Student\Dashboard;

    use App\model\Cart;
    use App\model\Discount;
    use App\model\LessonExam;
    use App\model\Transaction;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;


    class LessonExamController extends Controller
    {

        public function lessonExams()
        {

            $student     = Auth::guard('student')->user();
            $lessonExams = LessonExam::all();

            $cart = Session::get('cart');

            return view('student.dashboard.lessonExam.exams', compact('student', 'lessonExams', 'cart'));
        }


        public function addToCart($exm)
        {

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            //check if added before
            if ($lessonExam->hasInCart())
            {
                return redirect()->back();
            }
            else
            {
                $cart = new Cart();
                $cart->lessonExamId = $lessonExam->id;
                $cart->save();

                $authId = Auth::guard('student')->id();
                $carts = Cart::query()->where('studentId', $authId)->get();

                return redirect()->back()->with(['carts' => $carts]);
            }

        }


        public function purchaseForm()
        {

            $student = Auth::guard('student')->user();

            $carts = Cart::query()->where('studentId', $student->id)->whereIn('transactionId',[0])->get();

            // factor details such as price to pay...

            $price = 0;

            foreach ($carts as $cart)
            {
                $price += $cart->lessonExam->price;
            }


            return view('student.dashboard.lessonExam.purchase_show', compact('student', 'price', 'carts'));
        }


        public function validateDiscountCode(Request $request)
        {

            $result = [];

            $discount = Discount::query()->where('code', $request->input('discountCode'))->first();

            //check discount entity
            if ($discount)
            {

                if ($discount->isValid())
                {

                    $result[ 'status' ]         = 'success';
                    $result[ 'successMessage' ] = 'کد تخفیف وارد شده معتبر است.';
                    $result[ 'discountCode' ]   = $discount;

                    return $result;
                }

                else
                {
                    $result[ 'status' ]       = 'error';
                    $result[ 'errorMessage' ] = 'کد تخفیف وارد شده معتبر نیست.';

                    return $result;
                }

            }

            else
            {
                $result[ 'status' ]       = 'error';
                $result[ 'errorMessage' ] = 'کد تخفیف وارد شده صحیح نیست.';

                return $result;
            }

        }


        public function purchaseWallet(Request $request)
        {

            $student = Auth::guard('student')->user();

            $carts = Cart::query()->where('studentId', $student->id)->where('transactionId',0)->get();
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

                    //check wallet value
                    if ($student->wallet >= $discountPrice)
                    {
                        // create transaction

                        foreach($carts as $cart)
                        {
                            $lessonExam = $cart->lessonExam;

                            $cart_transaction                 = new Transaction();
                            $cart_transaction->type           = 'PURCHASE';
                            $cart_transaction->studentId      = $student->id;
                            $cart_transaction->itemId         = $lessonExam->id;
                            $cart_transaction->itemType       = 'LESSON_EXAM';
                            $cart_transaction->price          = $lessonExam->price;
                            $cart_transaction->discountId     = $discount->id;
                            $cart_transaction->discountPrice  = $discountPrice;
                            $cart_transaction->status         = 'SUCCESS';
                            $cart_transaction->save();
                            $cart->setTransaction($cart_transaction->id);

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
                    return redirect()->back()->withErrors(['invalidDiscountCode'=>'کد تخفیف وارد شده معتبر نیست.']);
                }

            }

            else
            {
                //does not have discount code

                if ($student->wallet >= $price)
                {

                    // create transaction

                    foreach($carts as $cart)
                    {
                        $lessonExam = $cart->lessonExam;

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

                    return redirect()->route('student_dashboard_transactions');
                }

                else
                {
                    return redirect()->back()->withErrors(['notEnoughCharge'=>'شارژ کیف پول شما برای خرید کافی نیست.']);
                }

            }


        }


        public function questions($exm)
        {

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            $questions = $lessonExam->questions;

            $student = Auth::guard('student')->user();

            return view('student.dashboard.lessonExam.exam_questions', compact('student', 'questions'));
        }


        public function questionsCorrect(Request $request)
        {

            return $request;
        }


        public function result()
        {

            $student = Auth::guard('student')->user();

            return view('student.dashboard.lessonExam.result', compact('student'));
        }

    }
