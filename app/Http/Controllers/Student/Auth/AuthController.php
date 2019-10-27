<?php

namespace App\Http\Controllers\Student\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\model\Student as Student;

class AuthController extends Controller
{

    public function verifyForm()
	{
		return view('student.auth.verify');
    }

	public function loginForm()
	{
        $studentInfo=cookie::get('studentInfo');
        $studentPass=cookie::get('studentPass');
        return view('student.auth.login',compact('studentInfo','studentPass'));
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



			return redirect()->route('student_dashboard_profile_form');

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
            return redirect()->route('student_dashboard_profile_form');

        }

		else
		{

            return redirect()->back()->withErrors(['loginFailed'=>['اطلاعات وارد شده صحیح نیست']]);

        }

    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student_login_form');
    }


	public function register(Request $request)
    {

        $this->validate($request,
        [
            'student_mobile' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/','unique:student,mobile'],
            'password_register'     => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/|min:6|confirmed',
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
            'forgetPassword' => 'required'
        ]
    );

    if($student = Student::query()->where('email',$request->input('forgetPassword'))->first())
    {

        $newPassword = substr(md5(uniqid(mt_rand(), true)), 0, 6);

        Mail::send('student.mail.forgetPassword', compact('student','newPassword'), function($message) use($student) {
            $message->to($student->email)->subject('بازیابی رمز عبور');
        });

        if(Mail::failures())
        {
            return redirect()->back()->withErrors(['forgetPasswordFailed'=>['بازیابی رمز عبور ناموفق']]);
        }
        else
        {
            $student->password=Hash::make($newPassword);
            $student->update();

            return redirect()->back()->with('status','sentToEmail');
        }
    }

    else if($student = Student::query()->where('mobile',$request->input('forgetPassword'))->first())
    {
        return redirect()->back()->with('status','sentToMobile');
    }

    else
    {
        return redirect()->back()->withErrors(['invalidInfo'=>['پست الکترونیکی یا شماره تلفن همراه وارد شده یافت نشد']]);
    }

    }

}
