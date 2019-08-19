<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Grade;
use App\model\Lesson;
use App\model\LessonExam;
use App\model\Orientation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class LessonExamController extends Controller
{


	public function exams()
	{
		$lessonExam = LessonExam::all();

		return view('admin.dashboard.lessonExam.exams', compact('lessonExam'));
	}



	public function addShow()
	{
		$lessons      = Lesson::all();
		$grades       = Grade::all();
		$orientations = Orientation::all();

		return view('admin.dashboard.lessonExam.form', compact('lessons', 'grades', 'orientations'));
	}



	public function add(Request $request)
	{
		//validate here


		$this->validate($request, [

			'lessonUrl'      => 'required|exists:lesson,url',
			'gradeUrl'       => 'required|exists:grade,url',
			'orientationUrl' => 'required|exists:orientation,url',
			'title'          => 'required|string|between:5,20',

		]);


		$lesson      = Lesson::query()->where('url', $request->input('lessonUrl'))->first();
		$grade       = Grade::query()->where('url', $request->input('gradeUrl'))->first();
		$orientation = Orientation::query()->where('url', $request->input('orientationUrl'))->first();

		//after validate

		$answerFile = $request->file('answerSheet');

		$lessonExam = new LessonExam();

		$lessonExam->exm         = 'TextExm';
		$lessonExam->title       = $request->input('title');
		$lessonExam->description = $request->input('description');
		$lessonExam->price       = $request->input('price');
		$lessonExam->answerSheet = $answerFile->hashName();

		$lessonExam->save();

		Storage::disk('lessonExam')->put($lessonExam->exm, $answerFile);

		return redirect()->route('admin_exams');
	}



	public function remove($exm)
	{
		$exam = LessonExam::query()->where('exm', $exm)->first();

		return response()->json(['success' => 'Data is successfully added']);
	}
}
