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
		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.gradeLesson.gradeLessons', compact('gradeLessons'));
	}



	public function remove($code)
	{
		$gradeLesson = GradeLesson::query()->where('code', $code);

		$gradeLesson->delete();

		return redirect()->route('admin_gradeLessons');
	}



	public function addShow()
	{
		$modify       = 0;
		$orientations = Orientation::all();
		$grades       = Grade::all();
		$lessons      = Lesson::all();

		return view('admin.dashboard.gradeLesson.form', compact('orientations', 'grades', 'lessons', 'modify'));
	}



	public function add(Request $request)
	{
		$this->validate($request, [

			'orientation' => 'required|exists:orientation,url',
			'grade'       => 'required|exists:grade,url',
			'lesson'      => 'required|exists:lesson,url',
			'type'        => 'required|exists:grade_lesson,type',
			'ratio'       => 'required|numeric|digits:1', // it is gradeLesson ratio

		]);

		$orientation = Orientation::query()->where('url', $request->input('orientation'))->first();
		$grade       = Grade::query()->where('url', $request->input('grade'))->first();
		$lesson      = Lesson::query()->where('url', $request->input('lesson'))->first();

		$gradeLesson = new GradeLesson();

		$gradeLesson->lessonId      = $lesson->id;
		$gradeLesson->gradeId       = $grade->id;
		$gradeLesson->orientationId = $orientation->id;
		$gradeLesson->ratio         = $request->input('ratio');
		$gradeLesson->type          = $request->input('type');
		// $gradeLesson->code          = $lesson->code . $grade->code . $orientation->code;

		$gradeLesson->save();

		return redirect()->route('admin_gradeLessons');
	}



	public function editShow($code)
	{
		$modify = 1;

		$gradeLesson  = GradeLesson::query()->where('code', $code)->first();
		$orientations = Orientation::all();
		$grades       = Grade::all();
		$lessons      = Lesson::all();

		return view('admin.dashboard.gradeLesson.form', compact('orientations', 'grades', 'lessons', 'gradeLesson', 'modify'));

	}



	public function edit(Request $request, $code)
	{
		$gradeLesson = GradeLesson::query()->where('code', $code)->first();

		$this->validate($request, [

			'orientation' => 'required|exists:orientation,url',
			'grade'       => 'required|exists:grade,url',
			'lesson'      => 'required|exists:lesson,url',
			'type'        => 'required|exists:grade_lesson,type',
			'ratio'       => 'required|numeric|digits:1',
		]);

		$orientation = Orientation::query()->where('url', $request->input('orientation'))->first();
		$grade       = Grade::query()->where('url', $request->input('grade'))->first();
		$lesson      = Lesson::query()->where('url', $request->input('lesson'))->first();


		$code = ['code' => $lesson->code . $grade->code . $orientation->code];

		$v = Validator::make($code, [
			'code' => 'unique:grade_lesson,code',
		], [
			'code.unique' => ' این درس با این وابستگی ها قبلا ثبت شده است.',
		]);

		if ($v->fails() && $gradeLesson->ratio == $request->input('ratio'))
		{
			return redirect()->back()->with(['errors' => $v->errors()]);
		}
		else
		{
			$gradeLesson->lessonId      = $lesson->id;
			$gradeLesson->gradeId       = $grade->id;
			$gradeLesson->orientationId = $orientation->id;
			$gradeLesson->ratio         = $request->input('ratio');
			// $gradeLesson->code          = $code['code'];

			$gradeLesson->update();

			return redirect()->route('admin_gradeLessons');
		}

	}
}
