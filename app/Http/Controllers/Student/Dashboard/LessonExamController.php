<?php

    namespace App\Http\Controllers\Student\Dashboard;

    use App\model\Cart;
    use App\model\LessonExam;
    use App\model\Result;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;


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
            $student     = Auth::guard('student')->user();
            $lessonExam  = LessonExam::query()->where('exm',$exm)->first();

            if ($lessonExam && $student->isComplete==1 && $lessonExam->orientation()->id == $student->orientationId && $student->gradeId >= $lessonExam->grade()->id)
            {
                return view('student.dashboard.lessonExam.details',compact('lessonExam'));
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams');
            }

        }


        public function addToCart($exm)
        {
            $student     = Auth::guard('student')->user();
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if (!$lessonExam->hasInCart() && !$lessonExam->hasPurchased() && $student->isComplete==1 && $lessonExam->orientation()->id == $student->orientationId && $student->gradeId >= $lessonExam->grade()->id)
            {
                $cart = new Cart();
                $cart->lessonExamId = $lessonExam->id;
                $cart->save();
                return redirect()->back();
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams');
            }

        }

        public function questions($exm)
        {
            $student    = Auth::guard('student')->user();
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if($lessonExam && $lessonExam->hasPurchased() && !$lessonExam->hasUsed() && $student->isComplete==1 && $lessonExam->orientation()->id == $student->orientationId && $student->gradeId >= $lessonExam->grade()->id)
            {
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

            if($lessonExam && $lessonExam->hasPurchased() && !$lessonExam->hasUsed() && $student->isComplete==1 && $lessonExam->orientation()->id == $student->orientationId && $student->gradeId >= $lessonExam->grade()->id)
            {
                $correctAnswers= 0;
                $wrongAnswers  = 0;
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

                $result                 = new Result();
                $result->type           = 'LESSONEXAM';
                $result->studentId      = $student->id;
                $result->examId         = $lessonExam->id;
                $result->correctAnswers = $correctAnswers;
                $result->wrongAnswers   = $wrongAnswers;
                $result->blankAnswers   = count($examQuestions)-($correctAnswers+$wrongAnswers);
                $result->status         = 'COMPLETE';
                $result->save();

                return redirect()->route('student_dashboard_purchasedExams');
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams');
            }

        }

        public function downloadAnswersheet($exm)
        {
            $student    = Auth::guard('student')->user();
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();
            $result     = Result::query()->where('studentId',$student->id)->where('type','LESSONEXAM')->where('examId',$lessonExam->id)->where('status','COMPLETE')->first();

            if($result)
            {
                return Storage::disk('lessonExam')->download($lessonExam->id.'/answersheet/'.$lessonExam->answersheet, $lessonExam->exm.'.pdf');
            }

            else
            {
                return redirect()->route('student_dashboard_lessonExams');
            }

        }

    }
