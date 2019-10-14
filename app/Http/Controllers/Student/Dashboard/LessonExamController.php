<?php

    namespace App\Http\Controllers\Student\Dashboard;

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


        public function purchase($exm)
        {

            $student = Auth::guard('student')->user();

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            if (!$lessonExam->isPaid())
            {
                //purchase exam

                if ($student->wallet > $lessonExam->price)
                {
                    //purchase exam

                    //check discount code

                    //purchase

                    $transaction = new Transaction();

                    $transaction->type     = 'PURCHASE';
                    $transaction->itemType = 'LESSON_EXAM';
                    $transaction->itemId   = $lessonExam->id;
                    $transaction->price    = $lessonExam->price;

                    $transaction->save();

                    return redirect()->back();

                }
                else
                {
                    //alert wallet charge is not enough

                    return 'wallet charge is not enough';
                }
            }
            else
            {
                //alert exam is paid

                return 'exam is paid already';

            }

        }


        public function questions($exm)
        {

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            $questions = $lessonExam->questions;

            $student = Auth::guard('student')->user();

            return view('student.dashboard.lessonExam.exam_questions', compact('student','questions'));
        }

    }
