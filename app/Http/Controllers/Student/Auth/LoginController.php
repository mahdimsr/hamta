<?php

namespace App\Http\Controllers\Student\Auth;

use App\Rules\Username;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class LoginController extends Controller
{
	public function show()
	{
		return view('student.auth.login');
	}



	public function login(Request $r)
	{
		Validator::make($r->all(), [

			'username' => ['required', new Username],
			'password' => ['required', 'size:9'],

		])->validate();

		$username = $r->input('username');
		$password = $r->input('password');


		if (Auth::attempt(['mobile' => $username, 'password' => $password]))
		{
			return 'ok';
		}
		else
		{
			return $r;
		}

	}

}
