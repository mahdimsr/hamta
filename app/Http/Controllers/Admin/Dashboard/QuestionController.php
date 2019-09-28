<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\model\GradeLesson;
    use App\model\LessonExam;
    use App\model\Question;
    use App\model\QuestionExam;
    use App\model\QuestionLesson;
    use App\model\QuestionType;
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
                    $exam          = $exam->first();
                    $questionTypes = QuestionType::all();

                    return view('admin.dashboard.question.formByExam', compact('exam', 'questionTypes', 'modify'));
                }
            }

            $gradeLessons = GradeLesson::all();

            return view('admin.dashboard.question.form', compact('gradeLessons', 'modify'));

        }


        public function add(Request $request)
        {

            $this->validate($request, [

                'topicGradeLesson' => 'required|exists:topic_grade_lesson,id',
                'hardness'         => 'required|integer|between:0,6|digits:1',
                'text'             => 'required',
                'optionFour'       => 'required',
                'optionThree'      => 'required',
                'optionTwo'        => 'required',
                'optionOne'        => 'required',
                'answer'           => ['required', Rule::in(['1', '2', '3', '4'])],

            ]);


            $question = new Question();

            $question->topicGradeLessonId = $request->input('topicGradeLesson');
            $question->questionTypeId     = $request->input('typeId');
            $question->text               = $request->input('text');
            $question->optionOne          = $request->input('optionOne');
            $question->optionTwo          = $request->input('optionTwo');
            $question->optionThree        = $request->input('optionThree');
            $question->optionFour         = $request->input('optionFour');
            $question->answer             = $request->input('answer');
            $question->hardness           = $request->input('hardness');

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
