<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ScholarshipController extends Controller
{
	public function scholarships()
	{
		$scholarships = Scholarship::all();

		return view('admin.dashboard.scholarship.scholarships', compact('scholarships'));
	}



	public function show($id)
	{
		$scholarship = Scholarship::query()->where('id', $id)->first();

		return view('admin.dashboard.scholarship.form', compact('scholarship'));
	}



	public function answer(Request $request, $id)
	{
		$scholarship = Scholarship::query()->where('id', $id)->first();

		$this->validate($request, [

			'adminMessage' => 'required|string|between:10,500',
			'status'       => 'required|in:IN-PROGRESS,ACCEPT,DECLINE',
		]);

		$scholarship->status       = $request->input('status');
		$scholarship->adminMessage = $request->input('adminMessage');
		$scholarship->adminId      = Auth::guard('admin')->id();

		$scholarship->update();

		return redirect()->route('admin_scholarships');
	}
}
