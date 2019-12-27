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
        $admin=Auth::guard('admin')->user();

		if($admin->level=="A")
		{
		$admins = Admin::query()->whereNotIn('id', [$admin->id])->whereNotIn('level',['A'])->where('parentId',$admin->id)->get();
		return view('admin.dashboard.admin.admins', compact('admins'));
        }

        else
        {
        return view('layouts.admin_dashboard');
        }

	}



	public function addShow()
	{
		$modify=0;
        $admin=Auth::guard('admin')->user();

		if($admin->level=="A")
		{
		return view('admin.dashboard.admin.form', compact('modify'));
        }

        else
        {
        return view('layouts.admin_dashboard');
        }

	}



	public function add(Request $request)
	{
		$this->validate($request,
			[
				'level'          		      => 'required',
				'fullName'       		      => 'required|string|max:30',
				'username_admin'       	      => 'required|alpha_dash|unique:admin,username',
				'password_admin'              => 'required|alpha_dash|min:6|confirmed',
				'password_admin_confirmation' => 'required',
			]);

		$admin = new Admin();

		$admin->parentId = Auth::guard('admin')->id();
		$admin->level    = $request->input('level');
		$admin->fullName = $request->input('fullName');
		$admin->username = $request->input('username_admin');
		$admin->password = Hash::make($request->input('password_admin'));

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
				'fullName'       		      => 'required|string|max:30',
				'username_admin'       		  => ['required', 'alpha_dash', Rule::unique('admin', 'username')->ignore($admin)],
				'password_admin'       		  => ['nullable','alpha_dash','min:6','confirmed',Rule::requiredIf($request->input('password_admin_confirmation') != null)],
				'password_admin_confirmation' => ['nullable',Rule::requiredIf($request->input('password_admin') != null)],
			]);

		$admin->fullName = $request->input('fullName');
		$admin->username = $request->input('username_admin');
		$admin->level    = $request->input('level');

		if ($request->has('password'))
		{
			$admin->password = Hash::make($request->input('password_admin'));
		}

		$admin->update();

		return redirect()->route('admin_admins');
	}

	public function remove($username)
	{

		$admin = Admin::query()->where('username', $username)->first();

		$admin->delete();

		return redirect()->route('admin_admins');
	}

}
