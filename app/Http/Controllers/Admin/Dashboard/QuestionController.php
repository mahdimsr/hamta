<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\GradeLesson;
use App\model\LessonExam;
use App\model\Question;
use App\model\QuestionExam;
use App\model\QuestionLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class QuestionController extends Controller
{
	public function questions(Request $request)
	{
		//admin_questions => route

		$exam = null;

		if ($request->has('exm'))
		{
			$exam = LessonExam::query()->where('exm', $request->input('exm'))->first();
		}

		$questions = Question::query()->paginate(10);


		return view('admin.dashboard.question.questions', compact('questions', 'exam'));
	}



	public function addShow($exm = null)
	{
		//show_addQuestion => route
		$modify = 0;

		if ($exm != null)
		{
			$exam = LessonExam::query()->where('exm', $exm);

			if ($exam->exists())
			{
				$exam = $exam->first();

				return view('admin.dashboard.question.formByExam', compact('exam', 'modify'));
			}
		}

		$gradeLessons = GradeLesson::all();

		return view('admin.dashboard.question.form', compact('gradeLessons', 'modify'));

	}



	public function add(Request $request)
	{
		$this->validate($request, [

			'type'        => ['required', Rule::in(['LESSON_EXAM', 'GIFT_EXAM', 'GENERAL'])],
			'gradeLesson' => 'required|exists:grade_lesson,code',
			'hardness'    => 'required|integer|between:0,6|digits:1',
			'text'        => 'required',
			'optionFour'  => 'required',
			'optionThree' => 'required',
			'optionTwo'   => 'required',
			'optionOne'   => 'required',
			'answer'      => ['required', Rule::in(['1', '2', '3', '4'])],

		]);

		$gradeLesson = GradeLesson::query()->where('code', $request->input('gradeLesson'))->first();


		$question = new Question();

		$question->gradeLessonId = $gradeLesson->id;
		$question->text          = $request->input('text');
		$question->optionOne     = $request->input('optionOne');
		$question->optionTwo     = $request->input('optionTwo');
		$question->optionThree   = $request->input('optionThree');
		$question->optionFour    = $request->input('optionFour');
		$question->answer        = $request->input('answer');
		$question->hardness      = $request->input('hardness');
		$question->type          = $request->input('type');

		$question->save();

		if ($request->has('exm'))
		{
			$exam = LessonExam::query()->where('exm', $request->input('exm'))->first();

			$questionExam = new QuestionExam();

			$questionExam->questionId = $question->id;
			$questionExam->examId     = $exam->id;

			$questionExam->save();
		}


		return redirect()->back();
	}
}
