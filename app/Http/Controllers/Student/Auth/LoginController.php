<?php

namespace App\Http\Controllers\Student\Auth;

use App\Rules\Username;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;


class LoginController extends Controller
{
	public function show()
	{
		return view('student.auth.login');
	}



	public function login(Request $request)
	{
		$this->validate($request,
			[
				'mobile-email' => 'required',
				'password'     => 'required',
			],
			[
				'mobile-email.required' => 'شماره تلفن همراه یا ایمیل خود را وارد نمایید.',
				'password.required'     => 'کلمه عبور خود را وارد نمایید.',
			]
		);
		if (Auth::attempt(['mobile'   => $request->input('mobile-email'),
						   'password' => $request->input('password'),
		], $request->input('remember')))
		{
			if ($request->has('remember'))
			{
				Cookie::queue('studentuser', $request->input('mobile-email'), 6 * 24 * 60);
				Cookie::queue('studentpass', $request->input('password'), 6 * 24 * 60);
			}
			else
			{
				Cookie::queue('studentuser', '');
				Cookie::queue('studentpass', '');
			}

			return redirect()->route('admin_dashboard');
		}
		else if (Auth::attempt(['email'    => $request->input('mobile-email'),
								'password' => $request->input('password'),
		], $request->input('remember')))
		{
			if ($request->has('remember'))
			{
				Cookie::queue('studentuser', $request->input('mobile-email'), 6 * 24 * 60);
				Cookie::queue('studentpass', $request->input('password'), 6 * 24 * 60);
			}
			else
			{
				Cookie::queue('studentuser', '');
				Cookie::queue('studentpass', '');

			}

			return redirect()->route('admin_dashboard');
		}
		else
		{
			return redirect()->route('student_login_show');
		}
	}

}
