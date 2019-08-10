<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function layout()
	{
		return view('student.dashboard.layout');
    }



	public function profile()
	{
		return view('student.dashboard.profile');
    }

}
