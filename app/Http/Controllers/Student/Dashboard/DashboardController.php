<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\StudentCode;
use App\model\Transaction;
use App\model\LessonExam;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function transactions()
	{

        $student   = Auth::guard('student')->user();
        $purchases = Transaction::query()->where('studentId',$student->id)->where('type','PURCHASE')->where('status','SUCCESS')->get();
        $charges   = Transaction::query()->where('studentId',$student->id)->where('type','CHARGE')->where('status','SUCCESS')->get();

		return view('student.dashboard.transaction.transactions', compact('student','purchases','charges'));
    }

    public function discounts()
	{

        $student          = Auth::guard('student')->user();
        $studentDiscounts = StudentCode::query()->where('studentId',$student->id)->get();

		return view('student.dashboard.discount.discounts', compact('student','studentDiscounts'));
    }


    public function home()
    {
        return view('student.dashboard.home');
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student_login_form');
    }

    public function purchased()
    {

        $student        = Auth::guard('student')->user();
        $purchasedExams = LessonExam::purchased();

        return view('student.dashboard.lessonExam.purchasedExams', compact('student', 'purchasedExams'));
    }

}
