<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\ExamGradeLesson;
use App\model\Grade;
use App\model\GradeLesson;
use App\model\Lesson;
use App\model\LessonExam;
use App\model\Orientation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class LessonExamController extends Controller
{


	public function exams()
	{
		$lessonExam = LessonExam::all();

		return view('admin.dashboard.lessonExam.exams', compact('lessonExam'));
	}



	public function addShow()
	{
		$modify = 0;

		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.lessonExam.form', compact('gradeLessons', 'modify'));
	}



	public function add(Request $request)
	{
		//validate here


		$this->validate($request, [

			'title' => 'required|string|between:5,20',
			'price' => 'integer',

		]);


		$lessonExam = new LessonExam();

		$lessonExam->title       = $request->input('title');
		$lessonExam->description = $request->input('description');
		$lessonExam->price       = $request->input('price');
		$lessonExam->status      = 'IN-QUESTION';

		$lessonExam->save();

		foreach ($request->input('gradeLessonsCode') as $gradeLessonCode)
		{
			$gradeLesson = GradeLesson::query()->where('code', $gradeLessonCode)->first();

			$examGradeLesson = new ExamGradeLesson();

			$examGradeLesson->gradeLessonId = $gradeLesson->id;
			$examGradeLesson->examId        = $lessonExam->id;

			$gradeLesson->save();
		}

		if ($request->hasFile('answerSheet'))
		{
			$answerFile              = $request->file('answerSheet');
			$lessonExam->answerSheet = $answerFile->hashName();
			$lessonExam->update();

			Storage::disk('lessonExam')->put($lessonExam->exm, $answerFile);

		}


		return redirect()->route('admin_exams');
	}



	public function editShow($exm)
	{
		$modify = 1;

		$lessonExam = LessonExam::query()->where('exm', $exm)->first();

		$lessons      = Lesson::all();
		$grades       = Grade::all();
		$orientations = Orientation::all();

		return view('admin.dashboard.lessonExam.form', compact('modify', 'lessonExam', 'lessons', 'grades', 'orientations'));
	}



	//edit


	public function questionShow()
	{
		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.lessonExam.question_form', compact('gradeLessons'));
	}



	public function remove($exm)
	{
		$exam = LessonExam::query()->where('exm', $exm)->first();

		return response()->json(['success' => 'Data is successfully added']);
	}
}
