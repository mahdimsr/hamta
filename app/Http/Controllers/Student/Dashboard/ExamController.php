<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\model\Cart;
use App\model\CartExam;
use App\model\LessonExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ExamController extends Controller
{
	public function exams()
	{

		$student = Auth::guard('student')->user();

		return view('student.dashboard.exams', compact('student'));
	}

}
