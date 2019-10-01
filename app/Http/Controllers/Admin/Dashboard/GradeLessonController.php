<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Grade;
use App\model\GradeLesson;
use App\model\Lesson;
use App\model\Orientation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\OrientationCategory;
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
		$modify                 = 0;
		$orientations           = Orientation::all();
		$grades                 = Grade::all();
		$lessons                = Lesson::all();
        $orientationCategories  = OrientationCategory::all();

		return view('admin.dashboard.gradeLesson.form', compact('orientations', 'grades', 'lessons','orientationCategories', 'modify'));
	}



	public function add(Request $request)
	{
		$this->validate($request, [

            'orientation'         => 'required',
            'orientationCategory' => 'required',
			'grade'               => 'required',
			'lesson'              => 'required',

        ]);

		$orientation = Orientation::query()->where('id', $request->input('orientation'))->first();
		$grade       = Grade::query()->where('id', $request->input('grade'))->first();
		$lesson      = Lesson::query()->where('id', $request->input('lesson'))->first();


		$code = ['code' => $orientation->code . $grade->code . $lesson->code];

		$v = Validator::make($code, [
			'code' => 'unique:grade_lesson,code',
		]);

		if ($v->fails())
		{
			return redirect()->back()->withErrors(['message' => [' این درس با این وابستگی ها قبلا ثبت شده است.']]);
		}
		else
		{

		$gradeLesson = new GradeLesson();

		$gradeLesson->lessonId              = $request->input('lesson');
		$gradeLesson->gradeId               = $request->input('grade');
		$gradeLesson->orientationCategoryId = $request->input('orientationCategory');

		$gradeLesson->save();

        return redirect()->route('admin_gradeLessons');
        }
	}



	public function editShow($code)
	{
		$modify = 1;

		$gradeLesson  = GradeLesson::query()->where('code', $code)->first();
		$orientations           = Orientation::all();
		$grades                 = Grade::all();
		$lessons                = Lesson::all();
        $orientationCategories  = OrientationCategory::all();

		return view('admin.dashboard.gradeLesson.form', compact('orientations','orientationCategories', 'grades', 'lessons', 'gradeLesson', 'modify'));

	}



	public function edit(Request $request, $code)
	{
		$gradeLesson = GradeLesson::query()->where('code', $code)->first();

		$this->validate($request, [

            'orientation'         => 'required',
            'orientationCategory' => 'required',
			'grade'               => 'required',
            'lesson'              => 'required',

		]);

		$orientation = Orientation::query()->where('id', $request->input('orientation'))->first();
		$grade       = Grade::query()->where('id', $request->input('grade'))->first();
		$lesson      = Lesson::query()->where('id', $request->input('lesson'))->first();


		$code = ['code' => $orientation->code . $grade->code . $lesson->code];

		$v = Validator::make($code, [
			'code' => 'unique:grade_lesson,code',
		]);

		if ($v->fails())
		{
			return redirect()->back()->withErrors(['message' => [' این درس با این وابستگی ها قبلا ثبت شده است.']]);
		}
		else
		{
			$gradeLesson->lessonId              = $request->input('lesson');
			$gradeLesson->gradeId               = $request->input('grade');
            $gradeLesson->orientationCategoryId = $request->input('orientationCategory');

			$gradeLesson->update();

			return redirect()->route('admin_gradeLessons');
		}

	}
}
