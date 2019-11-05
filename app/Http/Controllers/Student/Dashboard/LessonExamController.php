<?php

    namespace App\Http\Controllers\Student\Dashboard;

    use App\model\Cart;
    use App\model\Discount;
    use App\model\LessonExam;
    use App\model\Transaction;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\model\Result;
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Session;


    class LessonExamController extends Controller
    {

        public function lessonExams()
        {

            $student     = Auth::guard('student')->user();
            $lessonExams = LessonExam::all();

            return view('student.dashboard.lessonExam.exams', compact('student', 'lessonExams'));
        }


        public function details()
        {

            return view('student.dashboard.lessonExam.details');
        }


        public function addToCart($exm)
        {

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if ($lessonExam->hasInCart())
            {
                return redirect()->back();
            }

            else
            {
                $cart = new Cart();
                $cart->lessonExamId = $lessonExam->id;
                $cart->save();
                return redirect()->back();
            }

        }


        public function purchaseForm()
        {

            $student = Auth::guard('student')->user();
            $carts = Cart::query()->where('studentId', $student->id)->where('transactionId',0)->get();
            $price = 0;

            foreach ($carts as $cart)
            {
                $price += $cart->lessonExam->price;
            }

            return view('student.dashboard.lessonExam.purchase_show', compact('student', 'price'));
        }


        public function validateDiscountCode(Request $request)
        {
            $student = Auth::guard('student')->user();
            $result = [];
            $discount = Discount::query()->where('code', $request->input('discountCode'))->first();
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
                $result[ 'errorMessage' ] = 'کد تخفیف وارد شده صحیح نیست.';
                return $result;
            }

        }


        public function purchaseWallet(Request $request)
        {

            $student = Auth::guard('student')->user();
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
                    return redirect()->route('student_dashboard_transactions');
                }

                else
                {
                    return redirect()->back()->withErrors(['notEnoughCharge'=>'شارژ کیف پول شما برای خرید کافی نیست.']);
                }

            }
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams_purchaseForm');
            }


        }


        public function questions($exm)
        {
            $student = Auth::guard('student')->user();
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if($lessonExam && $lessonExam->hasPurchased() && !$lessonExam->hasUsed())
            {
                $result           = Result::query()->where('studentId',$student->id)->where('examId',$lessonExam->id)->where('status','IN-PROGRESS')->first();

                if(!$result)
                {
                    $result                 = new Result();
                    $result->type           = 'LESSONEXAM';
                    $result->studentId      = $student->id;
                    $result->examId         = $lessonExam->id;
                    $result->status         = 'IN-PROGRESS';
                    $result->save();
                }

                return view('student.dashboard.lessonExam.exam_questions', compact('student', 'lessonExam'));
            }

            else
            {
                 return redirect()->route('student_dashboard_lessonExams');
            }

        }

        public function result(Request $request ,$exm)
        {

            $student = Auth::guard('student')->user();
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if($lessonExam && $lessonExam->hasPurchased() && !$lessonExam->hasUsed())
            {
                $correctAnswers=0;
                $wrongAnswers=0;
                $examQuestions = $lessonExam->questions;
                $questions     = $request->get('questions');

                if($questions)
                {
                    foreach($examQuestions as $examQuestion)
                    {
                        foreach($questions as $key => $question)
                        {
                            if($examQuestion->id==ltrim($key,'answer') && $examQuestion->answer==$question)
                            {
                                $correctAnswers++;
                                break;
                            }

                            if($examQuestion->id==ltrim($key,'answer')  && $examQuestion->answer!=$question)
                            {
                                $wrongAnswers++;
                                break;
                            }
                        }
                    }
                }

                $result                 = Result::query()->where('studentId',$student->id)->where('examId',$lessonExam->id)->where('status','IN-PROGRESS')->first();
                $result->correctAnswers = $correctAnswers;
                $result->wrongAnswers   = $wrongAnswers;
                $result->blankAnswers   = count($examQuestions)-($correctAnswers+$wrongAnswers);
                $result->status         = 'COMPLETE';
                $result->update();

                return redirect()->route('student_dashboard_results');
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams');
            }

        }

    }
