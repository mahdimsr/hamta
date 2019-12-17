<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\GiftExam;
use App\model\LessonExam;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

	public function exams()
	{
        $lessonExams = count(LessonExam::all());
        $giftExams   = count(GiftExam::all());
		return view('admin.dashboard.exams',compact('lessonExams','giftExams'));
    }

	public function logout()
	{
		Auth::guard('admin')->logout();

		return redirect()->route('admin_auth_show');
    }

}
