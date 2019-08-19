<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\City;
use App\model\Grade;
use App\model\Orientation;
use App\model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{
	public function students()
	{
		$students = Student::all();

		return view('admin.dashboard.student.students', compact('students'));
	}



	public function editShow($nationalCode)
	{
		$student      = Student::query()->where('nationalCode', $nationalCode)->first();
		$grades       = Grade::all();
		$orientations = Orientation::all();
		$cities       = City::all();


		return view('admin.dashboard.student.form', compact('student', 'grades', 'orientations', 'cities'));
	}



	public function edit(Request $request, $nationalCode)
	{
		$student = Student::query()->where('nationalCode', $nationalCode)->first();

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
