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

            //find student and lessonExam
            $student = Auth::guard('student')->user();


            $discount = Discount::query()->where('code', $request->input('discountCode'));

            //check discount entity
            if ($discount->exists())
            {
                $discountCode = $discount->first();


                if ($discountCode->isValid())
                {

                    $result[ 'status' ]         = 'success';
                    $result[ 'successMessage' ] = 'code is valid';
                    $result[ 'discountCode' ]   = $discountCode;

                    return $result;
                }
                else
                {
                    $result[ 'status' ]       = 'error';
                    $result[ 'errorMessage' ] = 'code is not valid';

                    return $result;
                }

            }
            else
            {
                $result[ 'status' ]       = 'error';
                $result[ 'errorMessage' ] = 'code not exists';

                return $result;
            }
        }


        public function purchaseWallet(Request $request)
        {

            $student = Auth::guard('student')->user();

            $carts = Cart::query()->where('studentId', $student->id)->whereIn('transactionId',[0])->get();

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

                    //check wallet value
                    if ($student->wallet >= $discountPrice)
                    {
                        // create transaction

                        $transaction = new Transaction();

                        $transaction->type          = 'PURCHASE';
                        $transaction->itemType      = 'LESSON_EXAM';
                        $transaction->price         = $price;
                        $transaction->discountId    = $discountCode->id;
                        $transaction->discountPrice = $discountPrice;
                        $transaction->status        = 'SUCCESS';

                        $transaction->save();

                        foreach ($carts as $cart)
                        {
                            $cart->setTransaction($transaction);
                        }

                        $student->wallet = $student->wallet - $discountPrice;
                        $student->update();

                        return redirect()->route('student_dashboard_profile');
                    }
                    else
                    {
                        return 'wallet value is not enough';
                    }
                }
                else
                {
                    return redirect()->back()->withInput($request->all());
                }
            }
            else
            {
                //does not have discount code

                //check wallet value
                if ($student->wallet >= $price)
                {

                    // create transaction

                    $transaction = new Transaction();

                    $transaction->type     = 'PURCHASE';
                    $transaction->itemType = 'LESSON_EXAM';
                    $transaction->price    = $price;
                    $transaction->status   = 'SUCCESS';

                    $transaction->save();

                    foreach ($carts as $cart)
                    {
                        $cart->setTransaction($transaction);
                    }


                    $student->wallet = $student->wallet - $price;
                    $student->update();

                    return redirect()->route('student_dashboard_profile');
                }
                else
                {
                    return 'wallet value is not enough';
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
