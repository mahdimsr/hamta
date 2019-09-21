<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\model\LessonExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LessonExamController extends Controller
{
	public function exams()
	{

		$student     = Auth::guard('student')->user();
		$lessonExams = LessonExam::all();

		return view('student.dashboard.lessonExam.exams', compact('student','lessonExams'));
    }

    public function questions()
    {
        $student     = Auth::guard('student')->user();
        return view('student.dashboard.lessonExam.exam_questions',compact('student'));
    }

}
