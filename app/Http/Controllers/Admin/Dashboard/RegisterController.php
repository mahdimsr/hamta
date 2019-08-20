<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
	public function admins()
	{
		$admins = Admin::query()->whereNotIn('id', [Auth::id()])->get();

		return view('admin.dashboard.admin.admins', compact('admins'));
	}



	public function addShow()
	{
		$modify = 0;

		return view('admin.dashboard.admin.form', compact('modify'));
	}



	public function add(Request $request)
	{
		$this->validate($request,
			[
				'fullName'       => 'required|string|max:30',
				'username'       => 'required|alpha_dash|unique:admin,username',
				'password'       => 'required|alpha_dash|size:9|same:repeatPassword',
				'repeatPassword' => 'required|alpha_dash|size:9|same:password',
			]);

		$admin = new Admin();

		$admin->parentId = Auth::guard('admin')->id();
		$admin->fullName = $request->input('fullName');
		$admin->username = $request->input('username');
		$admin->password = Hash::make($request->input('password'));

		$admin->save();

		return redirect()->route('admin_admins');
	}



	public function editShow($username)
	{
		$modify = 1;

		$admin = Admin::query()->where('username', $username)->first();

		return view('admin.dashboard.admin.form', compact('admin', 'modify'));
	}



	public function edit(Request $request, $username)
	{
		$admin = Admin::query()->where('username', $username)->first();


		$this->validate($request,
			[
				'fullName'       => 'required|string|max:30',
				'username'       => ['required', 'alpha_dash', Rule::unique('admin', 'username')->ignore($admin)],
				'password'       => [
					'nullable',
					'alpha_dash',
					'size:9',
					'same:repeatPassword',
					Rule::requiredIf($request->input('repeatPassword') != null),
				],
				'repeatPassword' => [
					'nullable',
					'alpha_dash',
					'size:9',
					'same:password',
				],
			]);

		$admin->fullName = $request->input('fullName');
		$admin->username = $request->input('username');

		if ($request->has('password'))
		{
			$admin->password = Hash::make($request->input('password'));
		}

		$admin->update();

		return redirect()->route('admin_admins');
	}
}