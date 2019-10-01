<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\City;
use App\model\Province;
use App\model\Grade;
use App\model\Orientation;
use App\model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{
	public function students()
	{
		$students = Student::where('isComplete',1)->get();

		return view('admin.dashboard.student.students', compact('students'));
	}


	public function addShow()
	{
		$modify       =	0;	
		$grades       = Grade::all();
		$orientations = Orientation::all();
		$cities       = City::all();
		$provinces    = Province::all();

		return view('admin.dashboard.student.form', compact('grades', 'orientations', 'cities','modify'));
	}

	public function add(Request $request)
	{

		$this->validate($request,
		[
			'name'         => 'required',
			'familyName'   => 'required',
			'birthday'     => 'required',
			'email'        => 'required|email|unique:student,email',
			'nationalCode' => 'required|digits:10|unique:student,nationalCode',
			'city'         => 'required',
			'province'     => 'required',
			'address'      => 'required|string|max:200',
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
	$province    = Province::where('name', $request->input('province'))->first();
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

		return redirect()->route('admin_students');
	}

	public function editShow($id)
	{
		$modify       =	1;
		$student      = Student::query()->where('id', $id)->first();
		$grades       = Grade::all();
		$orientations = Orientation::all();
		$cities       = City::all();


		return view('admin.dashboard.student.form', compact('student', 'grades', 'orientations', 'cities','modify'));
	}



	public function edit(Request $request, $id)
	{
		$student = Student::query()->where('id', $id)->first();

		$city        = City::query()->where('name', $request->input('city'))->first();
		$grade       = Grade::query()->where('title', $request->input('grade'))->first();
		$state       = $city->state()->first();
		$orientation = Orientation::query()->where('title', $request->input('orientation'))->first();

		$this->validate($request,
			[
				'name'        => 'required',
				'familyName'  => 'required',
				'birthday'    => 'required',
				'email'       => 'required|email',
				'city'        => 'required',
				'address'     => 'required',
				'orientation' => 'required',
				'grade'       => 'required',
				'school'      => 'required',
				'averageUp'   => 'required|digits_between:1,2|min:5|max:20|numeric',
				'averageDown' => 'required|digits:2|min:00|max:99|numeric',
				'telePhone'   => 'required|digits:8',
				'parentPhone' => 'required|digits:11',
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

		$student->name          = $request->input('name');
		$student->familyName    = $request->input('familyName');
		$student->email         = $request->input('email');
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

		$student->update();

		return redirect()->route('admin_students');
	}
}
