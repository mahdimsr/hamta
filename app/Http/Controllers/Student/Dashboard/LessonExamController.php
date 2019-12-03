<?php

    namespace App\Http\Controllers\Student\Dashboard;

    use App\model\Cart;
    use App\model\LessonExam;
    use App\model\Result;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class LessonExamController extends Controller
    {

        public function exams()
        {

            $student     = Auth::guard('student')->user();
            $lessonExams = LessonExam::filter();

            return view('student.dashboard.lessonExam.exams', compact('student', 'lessonExams'));
        }


        public function details($exm)
        {
            $lessonExam = LessonExam::query()->where('exm',$exm)->first();
            return view('student.dashboard.lessonExam.details',compact('lessonExam'));
        }


        public function addToCart($exm)
        {

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if ($lessonExam->hasInCart() && !$lessonExam->hasPurchased())
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

        public function questions($exm)
        {
            $student    = Auth::guard('student')->user();
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if($lessonExam && $lessonExam->hasPurchased() && !$lessonExam->hasUsed())
            {
                $result = Result::query()->where('studentId',$student->id)->where('examId',$lessonExam->id)->where('status','IN-PROGRESS')->first();

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

            $student    = Auth::guard('student')->user();
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
