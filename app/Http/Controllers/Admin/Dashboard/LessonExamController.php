<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\ExamGradeLesson;
use App\model\Grade;
use App\model\GradeLesson;
use App\model\Lesson;
use App\model\LessonExam;
use App\model\Orientation;
use App\model\QuestionExam;
use App\model\Topic;
use App\model\TopicGradeLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class LessonExamController extends Controller
{


	public function exams()
	{
		//admin_exams => route

		$lessonExam = LessonExam::all();

		return view('admin.dashboard.lessonExam.exams', compact('lessonExam'));
	}



	public function addShow()
	{
		$modify = 0;

		$orientations      = Orientation::all();
		$lessons           = Lesson::query()->whereNotIn('parentId', [0])->get();
		$grades            = Grade::all();
		$topicGradeLessons = TopicGradeLesson::all();

		return view('admin.dashboard.lessonExam.form', compact('orientations', 'lessons', 'grades', 'topicGradeLessons', 'modify'));
	}



	public function add(Request $request)
	{
		//validate here

		$stepOne = Validator::make($request->only(['title', 'description', 'price']), [

			'title'       => 'required|string|between:5,20',
			'description' => 'nullable|string|between:5,20',
			'price'       => 'nullable|integer',

		]);

		if ($stepOne->fails())
		{
			return redirect()->back()->withErrors($stepOne->errors())->withInput($request->all());
		}

		$stepTwo = Validator::make($request->only(['orientation', 'lessons', 'itemType']), [

			'orientation' => 'required|exists:orientation,id',
			'lessons'     => 'required|exists:lesson,id',
			'itemType'    => 'required|in:LESSON,TOPIC',

		]);

		if ($stepTwo->fails())
		{
			return redirect()->back()->withErrors($stepTwo->errors())->withInput($request->all());
		}

		if ($request->input('itemType') == 'LESSON')
		{
			
		}
		else
		{

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



	public function addManyQuestion(Request $request)
	{
		$questionIds = $request->input('questionId');


		$exam = LessonExam::query()->where('exm', $request->input('exm'))->first();

		if (count($questionIds) > 0)
		{
			QuestionExam::query()
				->where('examId', $exam->id)
				->whereNotIn('questionId', $questionIds)
				->delete();
		}

		foreach ($questionIds as $questionId)
		{
			$questionExam = new QuestionExam();

			if (!QuestionExam::query()->where('questionId', $questionId)->where('examId', $exam->id)->exists())
			{
				$questionExam->questionId = $questionId;
				$questionExam->examId     = $exam->id;

				$questionExam->save();
			}
			else if (QuestionExam::query()->where('questionId', $questionId)->where('examId', $exam->id)->exists())
			{
				$questionExam = QuestionExam::query()
					->where('questionId', $questionId)
					->where('examId', $exam->id)
					->first();

				$questionExam->update();
			}

		}


		return redirect()->back();
	}



	public function remove($exm)
	{
		$exam = LessonExam::query()->where('exm', $exm)->first();

		return response()->json(['success' => 'Data is successfully added']);
	}
}
