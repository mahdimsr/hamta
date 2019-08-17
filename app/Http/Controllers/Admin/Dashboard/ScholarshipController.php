<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ScholarshipController extends Controller
{
	public function scholarships()
	{
		$scholarships = Scholarship::all();

		return view('admin.dashboard.scholarship.scholarships',compact('scholarships'));
	}



	public function editShow($url)
	{
		$scholarship = Scholarship::query()->where('url',$url)->first();

		return view('admin.dashboard.scholarship.form',compact('scholarship'));
	}
}
