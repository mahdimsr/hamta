<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\LessonExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class LessonExamController extends Controller
{


	public function exams()
	{
		$lessonExam = LessonExam::all();

		return view('admin.dashboard.lessonExam.exams',compact('lessonExam'));
	}



	public function addShow()
	{
		return view('admin.dashboard.lessonExam.add');
	}



	public function add(Request $request)
	{
		//validate here


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
		$exam = LessonExam::query()->where('exm',$exm)->first();

		return response()->json(['success'=>'Data is successfully added']);
	}
}
