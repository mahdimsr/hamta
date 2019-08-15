<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Grade;
use App\model\GradeLesson;
use App\model\Lesson;
use App\model\Orientation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class GradeLessonController extends Controller
{
	public function gradeLessons()
	{
		$gradeLessons = GradeLesson::query()->with('orientation')->with('grade')->with('lesson')->get();

		return view('admin.dashboard.gradeLesson.gradeLessons', compact('gradeLessons'));
	}



	public function remove(Request $r)
	{
		$gradeLesson = GradeLesson::query()->where('code', $r->input('code'));

		$gradeLesson->delete();

		return redirect()->route('admin_gradeLessons');
	}



	public function addShow()
	{
		$orientations = Orientation::all();
		$grades       = Grade::all();

		return view('admin.dashboard.gradeLesson.add', compact('orientations', 'grades'));
	}



	public function add(Request $r)
	{
		$this->validate($r, [

			'orientation' => 'required|exists:orientation,url',
			'grade'       => 'required|exists:grade,url',
			'type'        => 'required|exists:grade_lesson,type',
			'title'       => 'required|string|unique:lesson,title',
			'code'        => 'required|numeric|digits:2|unique:lesson,code', //it is lesson code
			'url'         => 'required|alpha|unique:lesson,url', // it is lesson url
			'ratio'       => 'required|numeric|digits:1', // it is gradeLesson ratio

		]);

		$orientation = Orientation::query()->where('url', $r->input('orientation'))->first();
		$grade       = Grade::query()->where('url', $r->input('grade'))->first();

		$lesson = new Lesson();

		$lesson->code  = $r->input('code');
		$lesson->title = $r->input('title');
		$lesson->url   = $r->input('url');

		$lesson->save();

		$gradeLesson = new GradeLesson();

		$gradeLesson->lessonId      = $lesson->id;
		$gradeLesson->gradeId       = $grade->id;
		$gradeLesson->orientationId = $orientation->id;
		$gradeLesson->ratio         = $r->input('ratio');
		$gradeLesson->type          = $r->input('type');
		$gradeLesson->code          = $lesson->code . $grade->code . $orientation->code;

		$gradeLesson->save();

		return redirect()->route('admin_gradeLessons');
	}



	public function editShow(Request $r)
	{

		$gradeLesson = GradeLesson::query()->where('code', $r->input('code'))->first();
		$orientations = Orientation::all();
		$grades       = Grade::all();
		$lessons      = Lesson::all();

		return view('admin.dashboard.gradeLesson.edit', compact('orientations', 'grades', 'lessons', 'gradeLesson'));

    }



	public function edit(Request $r)
	{
		$gradeLesson = GradeLesson::query()->find($r->input('id'));

		$this->validate($r, [

			'orientation' => 'required|exists:orientation,url',
			'grade'       => 'required|exists:grade,url',
			'lesson'      => 'required|exists:lesson,url',
			'type'        => 'required|exists:grade_lesson,type',
			'ratio'       => 'required|numeric|digits:1',
		]);

		$orientation = Orientation::query()->where('url', $r->input('orientation'))->first();
		$grade       = Grade::query()->where('url', $r->input('grade'))->first();
		$lesson      = Lesson::query()->where('url', $r->input('lesson'))->first();


		$code = ['code' => $lesson->code . $grade->code . $orientation->code];

		$v = Validator::make($code, [
			'code' => 'unique:grade_lesson,code',
		], [
			'code.unique' => ' این درس با این وابستگی ها قبلا ثبت شده است.',
		]);

		if ($v->fails())
		{
			return redirect()->back()->with(['errors' => $v->errors()]);
		}
		else
		{
			$gradeLesson->lessonId      = $lesson->id;
			$gradeLesson->gradeId       = $grade->id;
			$gradeLesson->orientationId = $orientation->id;
			$gradeLesson->ratio         = $r->input('ratio');
			$gradeLesson->code          = $code['code'];

			$gradeLesson->update();

			return redirect()->route('admin_gradeLessons');
		}

	}
}
