<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class QuestionController extends Controller
{
	public function questions()
	{
		return view('admin.dashboard.question.questions');
	}



	public function addQuestion(Request $request)
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


		$question = new Question();

		$question->text        = $request->input('text');
		$question->optionOne   = $request->input('optionOne');
		$question->optionTwo   = $request->input('optionTwo');
		$question->optionThree = $request->input('optionThree');
		$question->optionFour  = $request->input('optionFour');
		$question->answer      = $request->input('answer');
		$question->hardness    = $request->input('hardness');
		$question->type        = $request->input('type');

		$question->save();

		return $request;

	}
}
