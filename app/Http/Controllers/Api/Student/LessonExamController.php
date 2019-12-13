<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\Lib\Lib;
    use App\model\Cart;
    use App\model\Discount;
    use App\model\Grade;
    use App\model\LessonExam;
    use App\model\Orientation;
    use App\model\Question;
    use App\model\Result;
    use App\model\Transaction;
    use Carbon\Carbon;
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

            $status   = null;
            $duration = 0;
            $finished = false;

            $lessonExam = LessonExam::query()->with('questions')->find($lessonExamId);
            $student    = Auth::user();

            if ($lessonExam && $lessonExam->hasPurchased())
            {
                if ($lessonExam->hasUsed())
                {
                    $result = Result::query()
                                    ->where('studentId', $student->id)
                                    ->where('examId', $lessonExam->id)
                                    ->first();

                    if ($result->status == 'IN-PROGRESS')
                    {
                        $finished = false;

                    }
                    else
                    {
                        $finished = true;
                    }

                }
                else
                {
                    $result            = new Result();
                    $result->type      = 'LESSONEXAM';
                    $result->studentId = $student->id;
                    $result->examId    = $lessonExam->id;
                    $result->status    = 'IN-PROGRESS';
                    $result->save();

                    $finished = false;
                    $duration = $lessonExam->duration;
                }

            }

            $status = ApiHelper::$statusType[ 'ok' ];

            return response()->json(['status'     => $status,
                                     'config'     => ['isFinished' => $finished, 'duration' => $duration],
                                     'lessonExam' => $lessonExam]);
        }


        public function finishExam($lessonExamId, Request $request)
        {

            $message = null;

            $message = 'همه چی خوبه';

            $lessonExam = LessonExam::query()->find($lessonExamId);


            $oldResult = Result::query()->where('studentId', Auth::id())->where('examId', $lessonExamId)->exists();


            if ($oldResult)
            {
                $message = 'شما قبلا در آزمون شرکت کرده اید';


            }
            else
            {


                $correctAnswers = 0;
                $wrongAnswers   = 0;
                $blankAnswers   = 0;
                $examQuestions  = $lessonExam->questions;
                $questions      = $request->get('questions');


                foreach ($questions as $item)
                {

                    $question = Question::query()->find($item[ 'id' ]);


                    if ($item[ 'answer' ] == 0)
                    {
                        $blankAnswers = $blankAnswers + 1;
                    }
                    else
                    {
                        if ($question->answer == $item[ 'answer' ])
                        {
                            $correctAnswers = $correctAnswers + 1;
                        }
                        else
                        {
                            $wrongAnswers = $wrongAnswers + 1;
                        }
                    }
                }


                $result                 = new Result();
                $result->type           = 'LESSONEXAM';
                $result->examId         = $lessonExam->id;
                $result->blankAnswers   = $blankAnswers;
                $result->correctAnswers = $correctAnswers;
                $result->wrongAnswers   = $wrongAnswers;
                $result->status         = 'COMPLETE';
                $result->save();

            }


            return response()->json(['status'  => ApiHelper::$statusType[ 'ok' ],
                                     'isDone'  => true,
                                     'message' => $message]);
        }


        public function result($lessonExamId)
        {

            $student = Auth::user();

            $result = Result::query()
                            ->where('type', 'LESSONEXAM')
                            ->where('examId', $lessonExamId)
                            ->where('studentId', $student->id)
                            ->first();

            return response()->json(['status' => ApiHelper::$statusType[ 'ok' ],
                                     'result' => $result]);

        }


    }
