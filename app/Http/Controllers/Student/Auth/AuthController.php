<?php

namespace App\Http\Controllers\Student\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use \Illuminate\Support\Facades\Hash;
use App\model\Student as Student;

class AuthController extends Controller
{
	public function show()
	{
		return view('student.auth.student_auth');
    }


	public function login(Request $request)
	{

		$this->validate($request,
			[
				'mobile-email' => 'required',
				'password'     => 'required',
			]
        );

		if (Auth::attempt(['mobile'=> $request->input('mobile-email'),'password' => $request->input('password'),], $request->input('remember')))
		{

			if ($request->has('remember'))
			{
				Cookie::queue('studentuser', $request->input('mobile-email'), 90 * 24 * 60);
				Cookie::queue('studentpass', $request->input('password'), 90* 24 * 60);
            }

			else
			{
				Cookie::queue('studentuser', '');
				Cookie::queue('studentpass', '');
			}

            return redirect()->route('student_dashboard_profile');

        }

		else if (Auth::attempt(['email'=> $request->input('mobile-email'),'password' => $request->input('password'),], $request->input('remember')))
		{

			if ($request->has('remember'))
			{
				Cookie::queue('studentuser', $request->input('mobile-email'), 90 * 24 * 60);
				Cookie::queue('studentpass', $request->input('password'), 90 * 24 * 60);
            }

			else
			{
				Cookie::queue('studentuser', '');
				Cookie::queue('studentpass', '');

			}

            return redirect()->route('student_dashboard_profile');

        }

		else
		{
            return redirect()->route('student');
        }

    }


    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student');
    }


	public function register(Request $request,Student $student )
    {

        $this->validate($request,
        [
            'studentmobile' => 'required|unique:student,mobile|digits:11',
            'password_signup'     => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/|min:6|confirmed',
            'password_confirmation' =>'required',
        ]
        );

        $data['mobile']=$request->input('mobile');
        $data['password']=Hash::make($request->input('password_signup'));
        $student->insert($data);
        return redirect()->route('student');

    }


}
