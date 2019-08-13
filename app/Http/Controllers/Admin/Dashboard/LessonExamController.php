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



	public function add(Request $r)
	{
		//validate here


		//after validate

		$answerFile = $r->file('answerSheet');

		$lessonExam = new LessonExam();

		$lessonExam->exm         = 'TextExm';
		$lessonExam->title       = $r->input('title');
		$lessonExam->description = $r->input('description');
		$lessonExam->price       = $r->input('price');
		$lessonExam->answerSheet = $answerFile->hashName();

		$lessonExam->save();

		Storage::disk('lessonExam')->put($lessonExam->exm, $answerFile);

		return redirect()->route('admin_exams');
	}



	public function remove(Request $r)
	{
		$exam = LessonExam::query()->where('exm',$r->input('exm'))->first();

		return response()->json(['success'=>'Data is successfully added']);
	}
}
