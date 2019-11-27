<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use App\model\Discount;
    use App\model\Grade;
    use App\model\LessonExam;
    use App\model\Orientation;
    use App\model\Transaction;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;


    class LessonExamController extends Controller
    {

        public function lessonExams(Request $request)
        {

            $lessonExams = null;


            $grade = Grade::query()->where('url', $request->input('gradeUrl'))->first();

            $orientation = Orientation::query()->where('url', $request->input('orientationUrl'))->first();


            if ($request->has('gradeUrl') || $request->has('orientationUrl'))
            {
                $lessonExams = LessonExam::filterExam($grade, $orientation);

            }
            else
            {
                $lessonExams = LessonExam::query()->paginate();

            }


            return response()->json(['status'   => ApiHelper::$statusType[ 'ok' ],
                                     'dataList' => $lessonExams]);
        }


        public function addToCart(Request $request)
        {

            $v = Validator::make($request->all(), [

                'exm' => 'required'

            ]);

            if ($v->fails())
            {
                return response()->json(['status' => ApiHelper::$statusType[ 'validation' ], 'errors' => $v->errors()]);
            }
            else
            {
                $student = Auth::guard('api')->user();


                $lessonExam = LessonExam::query()->where('exm', $request->input('exm'))->first();

                if ($lessonExam->hasInCart())
                {
                    return response()->json(['status'       => ApiHelper::$statusType[ 'error' ],
                                             'errorMessage' => 'این آزمون در سبد خرید موجود است.']);
                }
                elseif ($lessonExam->hasPurchased())
                {
                    return response()->json(['status'       => ApiHelper::$statusType[ 'error' ],
                                             'errorMessage' => 'این آزمون را قبلا خریداری کرده اید.']);
                }
                else
                {

                    $cart               = new Cart();
                    $cart->lessonExamId = $lessonExam->id;
                    $cart->studentId    = $student->id;
                    $cart->save();

                    $cartCount = Cart::query()
                                     ->where('studentId', '=', $student->id)
                                     ->where('transactionId', '=', 0)
                                     ->count();

                    return response()->json(['status'    => ApiHelper::$statusType[ 'ok' ],
                                             'cartCount' => $cartCount]);
                }

            }

        }


        public function questions($lessonExamId)
        {

            $status = null;

            $lessonExam = LessonExam::query()->with('questions')->find($lessonExamId);

            $status = ApiHelper::$statusType['ok'];

            return response()->json(['status'     => $status,
                                     'lessonExam' => $lessonExam]);
        }

    }
