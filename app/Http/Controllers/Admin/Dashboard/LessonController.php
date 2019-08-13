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



	public function remove(Request $r)
	{
		$lesson = Lesson::query()->where('url', $r->input('url'))->first();

		$lesson->delete();

		return redirect()->route('admin_lessons');
	}



	public function addShow()
	{
		return view('admin.dashboard.lesson.add');
	}



	public function add(Request $r)
	{
		$this->validate($r, [

			'titleLesson' => 'required|alpha|max:10',
			'codeLesson'  => 'required|numeric|digits:2|unique:lesson,code',
			'urlLesson'   => 'required|string|unique:lesson,url',

		]);

		$lesson = new Lesson();

		$lesson->title = $r->input('titleLesson');
		$lesson->code  = $r->input('codeLesson');
		$lesson->url   = $r->input('urlLesson');

		$lesson->save();

		return redirect()->route('admin_lessons');
	}



	public function editShow(Request $r)
	{
		$lesson = Lesson::query()->where('url', $r->input('url'))->first();

		return view('admin.dashboard.lesson.edit', compact('lesson'));
	}



	public function edit(Request $r)
	{
		$lesson = Lesson::query()->find($r->input('id'));

		$this->validate($r, [

			'titleLesson' => 'required|string|max:20',
			'codeLesson'  => ['required', 'numeric', 'digits:2', Rule::unique('lesson', 'code')->ignore($lesson)],
			'urlLesson'   => ['required', 'string', Rule::unique('lesson', 'url')->ignore($lesson)],

		]);


		$lesson->title = $r->input('titleLesson');
		$lesson->code  = $r->input('codeLesson');
		$lesson->url   = $r->input('urlLesson');

		$lesson->update();

		return redirect()->route('admin_lessons');
	}
}
