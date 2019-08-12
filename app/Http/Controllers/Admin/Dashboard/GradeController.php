<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class GradeController extends Controller
{
	public function grades()
	{
		$grades = Grade::all();


		return view('admin.dashboard.grade.grades', compact('grades'));
	}



	public function addShow()
	{
		return view('admin.dashboard.grade.add');
	}



	public function add(Request $r)
	{
		$this->validate($r, [

			'title' => 'required|alpha|max:10',
			'code'  => 'required|numeric|digits:2|unique:grade,code',
			'url'   => 'required|string|unique:grade,url',

		]);

		$grade = new Grade();

		$grade->title = $r->input('title');
		$grade->code  = $r->input('code');
		$grade->url   = $r->input('url');

		$grade->save();

		return redirect()->route('admin_grades');
	}



	public function remove($url)
	{
		$grade = Grade::query()->where('url', $url)->first();

		$grade->delete();

		return redirect()->route('admin_grades');
	}



	public function editShow(Request $r)
	{

		$grade = Grade::query()->where('url', $r->input('url'))->first();

		return view('admin.dashboard.grade.edit', compact('grade'));
	}



	public function edit(Request $r)
	{
		$grade = Grade::query()->find($r->input('id'));

		$this->validate($r, [

			'title' => 'required|alpha|max:10',
			'code'  => ['required', 'numeric', 'digits:2', Rule::unique('grade')->ignore($grade)],
			'url'   => ['required', 'string', Rule::unique('grade')->ignore($grade)],

		]);


		$grade->title = $r->input('title');
		$grade->code  = $r->input('code');
		$grade->url   = $r->input('url');

		$grade->update();

		return redirect()->route('admin_grades');
	}
}
