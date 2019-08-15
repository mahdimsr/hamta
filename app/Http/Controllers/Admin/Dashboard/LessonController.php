<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class LessonController extends Controller
{
	public function lessons()
	{
		$lessons = Lesson::all();

		return view('admin.dashboard.lesson.lessons', compact('lessons'));
	}



	public function remove(Request $request)
	{
		$lesson = Lesson::query()->where('url', $request->input('url'))->first();

		$lesson->delete();

		return redirect()->route('admin_lessons');
	}



	public function addShow()
	{
		$modify = 0;

		return view('admin.dashboard.lesson.form', compact('modify'));
	}



	public function add(Request $request)
	{
		$this->validate($request, [

			'titleLesson' => 'required|alpha|max:10',
			'codeLesson'  => 'required|numeric|digits:2|unique:lesson,code',
			'urlLesson'   => 'required|string|unique:lesson,url',

		]);

		$lesson = new Lesson();

		$lesson->title = $request->input('titleLesson');
		$lesson->code  = $request->input('codeLesson');
		$lesson->url   = $request->input('urlLesson');

		$lesson->save();

		return redirect()->route('admin_lessons');
	}



	public function editShow($url)
	{
		$modify = 1;

		$lesson = Lesson::query()->where('url', $url)->first();

		return view('admin.dashboard.lesson.form', compact('lesson', 'modify'));
	}



	public function edit(Request $request,$url)
	{
		$lesson = Lesson::query()->where('url', $url)->first();

		$this->validate($request, [

			'titleLesson' => 'required|string|max:20',
			'codeLesson'  => ['required', 'numeric', 'digits:2', Rule::unique('lesson', 'code')->ignore($lesson)],
			'urlLesson'   => ['required', 'string', Rule::unique('lesson', 'url')->ignore($lesson)],

		]);


		$lesson->title = $request->input('titleLesson');
		$lesson->code  = $request->input('codeLesson');
		$lesson->url   = $request->input('urlLesson');

		$lesson->update();

		return redirect()->route('admin_lessons');
	}
}
