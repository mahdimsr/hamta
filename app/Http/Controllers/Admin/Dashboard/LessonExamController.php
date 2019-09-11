<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\ExamGradeLesson;
use App\model\Grade;
use App\model\GradeLesson;
use App\model\Lesson;
use App\model\LessonExam;
use App\model\Orientation;
use App\model\QuestionExam;
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

		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.lessonExam.form', compact('gradeLessons', 'modify'));
	}



	public function add(Request $request)
	{
		//validate here


		$this->validate($request, [

			'gradeLessonsCode' => 'required',
			'title'            => 'required|string|between:5,20',
			'price'            => 'integer',

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

			$examGradeLesson->save();
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
