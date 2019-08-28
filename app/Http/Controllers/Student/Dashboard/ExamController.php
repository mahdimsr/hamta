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



	public function addToCart(Request $r)
	{

		$cart = new Cart();

		$cart->studentId = Auth::guard('student')->id();

		$cart->save();

		$lessonExam = LessonExam::query()->where('exm', $r->input('exm'))->first();


		$cartExam = new CartExam();

		$cartExam->examId = $lessonExam->id;
		$cartExam->cartId = $cart->id;

		$cartExam->save();

		return count($cart->cartExams);
	}
}
