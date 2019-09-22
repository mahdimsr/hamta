<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\OrientationCategory;
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

		$orientations = Orientation::all();
		$grades       = Grade::all();
		$orientationCategories  = OrientationCategory::all();
		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.lessonExam.form', compact('orientations', 'grades', 'orientationCategories', 'gradeLessons', 'modify'));
	}



	public function add(Request $request)
	{
		//validate here

		$this->validate($request, [

			'gradeLessons' => 'required|exists:grade_lesson,id',
			'title'        => 'required|string|between:5,20',
			'price'        => 'nullable|integer|min:0',
			'description'  => 'nullable|string|max:500',
			'answerSheet'  => 'nullable|file|mimes:pdf|max:1000',

		]);

		$lessonExam = new LessonExam();

		$lessonExam->title       = $request->input('title');
		$lessonExam->price       = $request->input('price');
		$lessonExam->description = $request->input('description');

		$lessonExam->save();

		if ($request->has('answerSheet'))
		{
			$answerSheet = $request->file('answerSheet');

			Storage::disk('lessonExam')->put($lessonExam->id, $answerSheet);

			$lessonExam->answerSheet = $answerSheet->hashName();
			$lessonExam->update();
		}

		foreach ($request->input('gradeLessons') as $item)
		{
			$examGradeLesson = new ExamGradeLesson();

			$examGradeLesson->examId        = $lessonExam->id;
			$examGradeLesson->gradeLessonId = $item;

			$examGradeLesson->save();
		}


		return redirect()->route('admin_exams');
	}



	public function editShow($exm)
	{
		$modify = 1;

		$lessonExam = LessonExam::query()->where('exm', $exm)->first();

		$grades       = Grade::all();
		$orientationCategories   = Category::all();
		$orientations = OrientationCategory::all();
		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.lessonExam.form', compact('modify', 'lessonExam', 'gradeLessons', 'orientationCategories', 'grades', 'orientations'));
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
