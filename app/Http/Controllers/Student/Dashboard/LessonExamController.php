<?php

    namespace App\Http\Controllers\Student\Dashboard;

    use App\model\Discount;
    use App\model\LessonExam;
    use App\model\Transaction;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;


    class LessonExamController extends Controller
    {

        public function exams()
        {

            $student     = Auth::guard('student')->user();
            $lessonExams = LessonExam::all();

            return view('student.dashboard.lessonExam.exams', compact('student', 'lessonExams'));
        }


        public function purchaseShow($exm)
        {

            $student = Auth::guard('student')->user();

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();


            return view('student.dashboard.lessonExam.purchase_show', compact('student', 'lessonExam'));
        }


        public function validateDiscountCode(Request $request)
        {


            $result = [];

            //find student and lessonExam
            $student = Auth::guard('student')->user();

            $lessonExam = LessonExam::query()->where('exm', $request->input('exm'))->first();


            $discount = Discount::query()->where('code', $request->input('discountCode'));

            //check discount entity
            if ($discount->exists())
            {
                $discountCode = $discount->first();



                if ($discountCode->isValid($lessonExam->id))
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


        public function purchase(Request $request)
        {

            return $request;

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
