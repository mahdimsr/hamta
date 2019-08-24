<?php

namespace App\Http\Controllers\Student\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\model\City as City;
use App\model\Province as Province;
use App\model\Grade as Grade;
use App\model\Orientation as Orientation;
use Illuminate\Validation\Rule;
use Morilog\Jalali\CalendarUtils;
use App\Lib\Lib;


class DashboardController extends Controller
{

	public function profile()
	{

		$student      = Auth::guard('student')->user();
		$cities       = City::all();
		$grades       = Grade::all();
        $orientations = Orientation::all();
        $provinces    = Province::all();
		return view('student.dashboard.profile', compact('student', 'cities','provinces', 'grades', 'orientations'));

	}



	public function update(Request $request)
	{

		$student = Auth::guard('student')->user();

		$this->validate($request,
			[
				'name'         => 'required',
				'familyName'   => 'required',
				'birthday'     => 'required',
				'email'        => 'required|email|unique:student,email',
				'nationalCode' => 'required|digits:10',
                'city'         => 'required',
                'province'     => 'required',
				'address'      => 'required',
				'orientation'  => 'required',
				'grade'        => 'required',
				'school'       => 'required',
				'averageUp'    => 'required|digits_between:1,2|min:5|max:20|numeric',
				'averageDown'  => 'required|digits:2|min:00|max:99|numeric',
				'telePhone'    => 'required|digits:8',
				'parentPhone'  => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
			]
		);

		$city        = City::where('name', $request->input('city'))->first();
		$grade       = Grade::where('title', $request->input('grade'))->first();
		$province    = Province::where('id', $request->input('province'))->first();
		$orientation = Orientation::where('title', $request->input('orientation'))->first();

		if ($request->input('averageUp') == '20')
		{
			$average = $request->input('averageUp') . '/00';
		}
		else
		{
			$average = $request->input('averageUp') . '/' . $request->input('averageDown');
		}

		$student->name         = $request->input('name');
		$student->familyName   = $request->input('familyName');
		$student->email        = $request->input('email');
		$student->nationalCode = $request->input('nationalCode');
		$student->address      = $request->input('address');
		$student->average      = $average;

		// convert and insert birthday
		$Jalalian          = Lib::convertFaToEn($request->input('birthday'));
		$dateTime          = CalendarUtils::createDatetimeFromFormat('Y/m/d', $Jalalian);
		$carbon            = Carbon::createFromTimestamp($dateTime->getTimestamp());
		$student->birthday = $carbon->toDateTimeString();
		//end birthday section

		$student->school        = $request->input('school');
		$student->telePhone     = $province->areaCode . ' - ' . $request->input('telePhone');
		$student->parentPhone   = $request->input('parentPhone');
		$student->cityId        = $city->id;
		$student->orientationId = $orientation->id;
		$student->gradeId       = $grade->id;
		$student->isComplete    = 1;

		$student->save();

		return redirect()->route('student_dashboard_profile');

    }

	public function edit(Request $request)
	{

		$student = Auth::guard('student')->user();

		$this->validate($request,
			[
				'email'               => ['required','email',Rule::unique('student', 'email')->ignore($student)],
				'address'             => 'required',
				'telePhone'           => 'required|digits:8',
                'parentPhone'         => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
                'student_mobile_edit' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/',Rule::unique('student', 'mobile')->ignore($student)],
			]
		);

		$city        = City::where('id', $student->cityId)->first();
        $province       = $city->province()->first();

		$student->email        = $request->input('email');
		$student->address      = $request->input('address');
		$student->telePhone     = $province->areaCode . ' - ' . $request->input('telePhone');
		$student->parentPhone   = $request->input('parentPhone');
		$student->save();

		return redirect()->route('student_dashboard_profile');

	}

}
