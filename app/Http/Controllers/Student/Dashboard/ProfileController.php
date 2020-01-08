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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Image;


class ProfileController extends Controller
{

	public function profileForm()
	{

		$student      = Auth::guard('student')->user();
		$cities       = City::all();
		$grades       = Grade::all();
        $orientations = Orientation::all();
        $provinces    = Province::all();
		return view('student.dashboard.profile.form', compact('student', 'cities','provinces', 'grades', 'orientations'));

	}

	public function profileUpdate(Request $request)
	{

        $student = Auth::guard('student')->user();

        if($student->isComplete==0)
        {
		$this->validate($request,
			[
				'name'         => 'required',
				'familyName'   => 'required',
				'birthday'     => 'required',
				'email'        => 'nullable|email|unique:student,email',
				'nationalCode' => 'required|digits:10|unique:student,nationalCode',
                'city'         => 'required|exists:city,id',
                'province'     => 'required|exists:province,id',
				'address'      => 'required|string|max:200',
				'orientation'  => 'required|exists:orientation,id',
				'grade'        => 'required|exists:grade,id',
				'school'       => 'nullable|string',
				'averageUp'    => 'required|digits_between:1,2|min:5|max:20|numeric',
				'averageDown'  => 'required|digits:2|min:00|max:99|numeric',
				'telePhone'    => 'nullable|digits:8',
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

        return redirect()->route('student_dashboard_profile_form');

    }

	public function profileEdit(Request $request)
	{

		$student = Auth::guard('student')->user();

		$this->validate($request,
			[
				'email'               => ['nullable','email',Rule::unique('student', 'email')->ignore($student)],
				'address'             => 'required|string|max:200',
                'telePhone'           => 'nullable|digits:8',
                'city'                => 'required|exists:city,id',
                'province'            => 'required|exists:province,id',
                'school'              => 'nullable|string',
                'parentPhone'         => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
                'student_mobile_edit' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/',Rule::unique('student', 'mobile')->ignore($student)],
			]
		);

		$student->email        = $request->input('email');
        $student->address      = $request->input('address');
        $student->school       = $request->input('school');
        $student->cityId       = $request->input('city');
		$student->telePhone    = $request->input('telePhone');
        $student->parentPhone  = $request->input('parentPhone');
        $student->mobile       = $request->input('student_mobile_edit');
		$student->update();

		return redirect()->route('student_dashboard_profile_form');

    }

    public function profileImage(Request $request)
    {
        $student = Auth::guard('student')->user();

        $this->validate($request,
        [
            'profileImage' => 'image|max:10000'
        ]
        );

        if ($request->hasFile('profileImage'))
        {

            if($student->profileImage)
            {
                Storage::disk('student')->delete($student->id . '/profileImage/' . $student->profileImage);
            }

            $profileImage = $request->file('profileImage');
            Storage::disk('student')->put($student->id . '/profileImage', $profileImage);
            $student->profileImage    = $profileImage->hashName();
            $path                     = public_path('storage/students/'.$student->id.'/profileImage/'.$student->profileImage);
            $resizeImage              = Image::make($path)->resize(200,200,function($constraint)
            {
                $constraint->aspectRatio();
            });
            $resizeImage->save($path);

            $student->update();

        }

        return redirect()->route('student_dashboard_profile_form');
    }

    public function profilePassword(Request $request)
    {
        $student = Auth::guard('student')->user();

        $this->validate($request,
        [
            'oldPassword'               => 'required',
            'newPassword'               => 'required|min:6|confirmed',
            'newPassword_confirmation'  => 'required',
        ]
        );

        if (Hash::check($request->input('oldPassword'), $student->password))
        {
            $student->password = Hash::make($request->input('newPassword'));
            $student->update();

            return redirect()->route('student_dashboard_profile_form');
        }

        else
        {
            return redirect()->route('student_dashboard_profile_form')->withErrors(['oldPassword'=>'رمز عبور کنونی وارد شده صحیح نیست']);
        }

    }
}
