<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
	public function dashboard()
	{
		$admin = Auth::user();

		return view('layouts.admin_dashboard',compact('admin'));
	}



	public function exams()
	{
		return view('admin.dashboard.exams');
	}


}
