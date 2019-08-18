<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
	public function show()
	{
        $adminInfo=cookie::get('adminInfo');
        $adminPass=cookie::get('adminPass');
		return view('admin.auth.login',compact('adminInfo','adminPass'));
	}



	public function login(Request $request)
	{
		$username   = $request->input('username');
        $password = $request->input('password');

		$this->validate($request,
			[
				'username' => 'required',
				'password'     => 'required',
			]
        );

		if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $request->input('remember')))
		{

            if ($request->has('remember'))
			{
				Cookie::queue('adminInfo', $request->input('username'), 90 * 24 * 60);
				Cookie::queue('adminPass', $request->input('password'), 90* 24 * 60);
            }

			else
			{
				Cookie::queue('adminInfo', '');
				Cookie::queue('adminPass', '');
            }

            return redirect()->route('admin_dashboard');

        }

		else
		{

            return redirect()->back()->withErrors(['message'=>['اطلاعات وارد شده صحیح نیست.']]);

		}

	}



	public function logout()
	{
		Auth::guard('admin')->logout();

		return redirect()->route('admin_auth_show');
	}
}
