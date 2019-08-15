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
        $modify=0;
		return view('admin.dashboard.grade.form',compact('modify'));
	}



	public function add(Request $request)
	{
		$this->validate($request, [

			'titleGrade' => 'required|alpha|max:10',
			'codeGrade'  => 'required|numeric|digits:2|unique:grade,code',
			'urlGrade'   => 'required|string|unique:grade,url',

		]);

		$grade = new Grade();

		$grade->title = $request->input('titleGrade');
		$grade->code  = $request->input('codeGrade');
		$grade->url   = $request->input('urlGrade');

		$grade->save();

		return redirect()->route('admin_grades');
	}



	public function remove(Request $request,$url)
	{
		$grade = Grade::query()->where('url', $url)->first();

		$grade->delete();

		return redirect()->route('admin_grades');
	}



	public function editShow(Request $request,$url)
	{
        $modify=1;
		$grade = Grade::query()->where('url', $url)->first();

		return view('admin.dashboard.grade.form', compact('grade','modify'));
	}



	public function edit(Request $request,$url)
	{
		$grade = Grade::query()->where('url', $url)->first();

		$this->validate($request, [

			'titleGrade' => 'required|alpha|max:10',
			'codeGrade'  => ['required', 'numeric', 'digits:2', Rule::unique('grade','code')->ignore($grade)],
			'urlGrade'   => ['required', 'string', Rule::unique('grade','url')->ignore($grade)],

		]);


		$grade->title = $request->input('titleGrade');
		$grade->code  = $request->input('codeGrade');
		$grade->url   = $request->input('urlGrade');

		$grade->update();

		return redirect()->route('admin_grades');
	}
}
