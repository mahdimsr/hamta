<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
	public function show()
	{
		return view('admin.auth.login');
	}



	public function login(Request $request)
	{
		$mobile   = $request->input('mobile');
		$password = $request->input('password');

		if (Auth::guard('admin')->attempt(['mobile' => $mobile, 'password' => $password]))
		{
			return redirect()->route('admin_dashboard');
		}
		else
		{
			return redirect()->route('admin_auth_show');
		}

	}



	public function logout()
	{
		Auth::guard('admin')->logout();

		return redirect()->route('admin_auth_show');
	}
}
