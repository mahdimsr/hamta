<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\model\City as City;
use App\model\Grade as Grade;
use App\model\Orientation as Orientation;


class DashboardController extends Controller
{

	public function profile()
	{

		$student      = Auth::guard('student')->user();
		$cities       = City::all();
		$grades       = Grade::all();
		$orientations = Orientation::all();
		return view('student.dashboard.profile', compact('student', 'cities', 'grades', 'orientations'));

	}



	public function update(Request $request)
	{

		$student     = Auth::guard('student')->user();

		$this->validate($request,
			[
				'name'         => 'required',
				'familyName'   => 'required',
				'birthday'     => 'required',
				'email'        => 'required|email',
				'nationalCode' => 'required|digits:10',
				'city'         => 'required',
				'address'      => 'required',
				'orientation'  => 'required',
				'grade'        => 'required',
				'school'       => 'required',
				'averageUp'    => 'required|digits_between:1,2|min:5|max:20|numeric',
				'averageDown'  => 'required|digits:2|min:00|max:99|numeric',
				'telePhone'    => 'required|digits:8',
				'parentPhone'  => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/'],
			]
		);

		$city        = City::where('name', $request->input('city'))->first();
		$grade       = Grade::where('title', $request->input('grade'))->first();
		$state       = $city->state()->first();
        $orientation = Orientation::where('title', $request->input('orientation'))->first();

		if ($request->input('averageUp') == '20')
		{
			$average = $request->input('averageUp') . '/00';
		}
		else
		{
			$average = $request->input('averageUp') . '/' . $request->input('averageDown');
		}

		$student->name          = $request->input('name');
		$student->familyName    = $request->input('familyName');
		$student->email         = $request->input('email');
		$student->nationalCode  = $request->input('nationalCode');
		$student->address       = $request->input('address');
		$student->average       = $average;
		$student->birthday      = $request->input('birthday');
		$student->school        = $request->input('school');
		$student->telePhone     = $state->areaCode . ' - ' . $request->input('telePhone');
		$student->parentPhone   = $request->input('parentPhone');
		$student->cityId        = $city->id;
		$student->orientationId = $orientation->id;
		$student->gradeId       = $grade->id;
		$student->isComplete    = 1;

		$student->save();

		return redirect()->route('student_dashboard_profile');

	}


}
