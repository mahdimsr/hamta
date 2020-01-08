<?php

namespace App\Http\Controllers\Student\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\model\Student as Student;

class AuthController extends Controller
{

    public function verifyForm()
	{
		return view('student.auth.verify');
    }

    public function newPasswordForm()
	{
		return view('student.auth.newPassword');
    }

	public function loginForm()
	{

        if (Auth::guard('student')->check())
        {
            return redirect()->route('student_dashboard_home');
        }

        else
        {
            $studentInfo=cookie::get('studentInfo');
            $studentPass=cookie::get('studentPass');
            return view('student.auth.login',compact('studentInfo','studentPass'));
        }

    }

	public function registerForm()
	{

        return view('student.auth.register');

    }

	public function login(Request $request)
	{

		$this->validate($request,
			[
				'mobile_email' => 'required',
				'password'     => 'required',
			]
        );

		if (Auth::guard('student')->attempt(['mobile'=> $request->input('mobile_email'),'password' => $request->input('password'),], $request->input('remember')))
		{
            $student=Auth::guard('student')->user();

			if ($request->has('remember'))
			{
				Cookie::queue('studentInfo', $request->input('mobile_email'), 90 * 24 * 60);
				Cookie::queue('studentPass', $request->input('password'), 90* 24 * 60);
            }

			else
			{
				Cookie::queue('studentInfo', '');
				Cookie::queue('studentPass', '');
			}

            if($student->isComplete==0)
            {
                return redirect()->route('student_dashboard_profile_form');
            }

            else
            {
                return redirect()->route('student_dashboard_home');
            }

        }

		else if (Auth::guard('student')->attempt(['email'=> $request->input('mobile_email'),'password' => $request->input('password'),], $request->input('remember')))
		{

			if ($request->has('remember'))
			{
				Cookie::queue('studentInfo', $request->input('mobile_email'), 90 * 24 * 60);
				Cookie::queue('studentPass', $request->input('password'), 90 * 24 * 60);
            }

            else
			{
				Cookie::queue('studentInfo', '');
				Cookie::queue('studentPass', '');

            }

            if($student->isComplete==0)
            {
                return redirect()->route('student_dashboard_profile_form');
            }

            else
            {
                return redirect()->route('student_dashboard_home');
            }

        }

		else
		{

            return redirect()->back()->withErrors(['loginFailed'=>['اطلاعات وارد شده صحیح نیست']]);

        }

    }

	public function register(Request $request)
    {

        $this->validate($request,
        [
            'student_mobile'                 => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/','unique:student,mobile'],
            'password_register'              => 'required|min:6|confirmed',
            'password_register_confirmation' => 'required',
        ]
        );

        $student           = new Student();
		$student->mobile   = $request->input('student_mobile');
		$student->password = Hash::make($request->input('password_register'));
        $student->save();

        Auth::guard('student')->login($student, false);

        return redirect()->route('student_dashboard_profile_form');

    }

    public function forgetPassword(Request $request)
    {
        $this->validate($request,
        [
            'forgetPassword' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/','exists:student,mobile']
        ]
    );

        return redirect()->back()->with('status','sentToMobile');

    }

}
