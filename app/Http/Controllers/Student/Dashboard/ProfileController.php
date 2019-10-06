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


class ProfileController extends Controller
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

        if($student->isComplete==0)
        {
		$this->validate($request,
			[
				'name'         => 'required',
				'familyName'   => 'required',
				'birthday'     => 'required',
				'email'        => 'required|email|unique:student,email',
				'nationalCode' => 'required|digits:10|unique:student,nationalCode',
                'city'         => 'required|exists:city,id',
                'province'     => 'required',
				'address'      => 'required|string|max:200',
				'orientation'  => 'required|exists:orientation,id',
				'grade'        => 'required|exists:grade,id',
				'school'       => 'required',
				'averageUp'    => 'required|digits_between:1,2|min:5|max:20|numeric',
				'averageDown'  => 'required|digits:2|min:00|max:99|numeric',
				'telePhone'    => 'required|digits:8',
				'parentPhone'  => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
			]
		);

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
		$student->telePhone     = $request->input('telePhone');
		$student->parentPhone   = $request->input('parentPhone');
		$student->cityId        = $request->input('city');
		$student->orientationId = $request->input('orientation');
		$student->gradeId       = $request->input('grade');
		$student->isComplete    = 1;

		$student->update();
        }

        return redirect()->route('student_dashboard_profile');

    }

	public function edit(Request $request)
	{

		$student = Auth::guard('student')->user();

		$this->validate($request,
			[
				'email'               => ['required','email',Rule::unique('student', 'email')->ignore($student)],
				'address'             => 'required|string|max:200',
                'telePhone'           => 'required|digits:8',
                'city'                => 'required|exists:city,id',
                'province'            => 'required',
                'parentPhone'         => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
                'student_mobile_edit' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/',Rule::unique('student', 'mobile')->ignore($student)],
			]
		);

		$student->email        = $request->input('email');
        $student->address      = $request->input('address');
        $student->cityId       = $request->input('city');
		$student->telePhone    = $request->input('telePhone');
        $student->parentPhone  = $request->input('parentPhone');
        $student->mobile       = $request->input('student_mobile_edit');
		$student->update();

		return redirect()->route('student_dashboard_profile');

	}

}
