<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\model\GradeLesson;
    use App\model\TopicGradeLesson;
    use App\model\LessonExam;
    use App\model\Question;
    use App\model\QuestionExam;
    use App\model\ExamGradeLesson;
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


        public function addShow($exm)
        {

            //show_addQuestion => route
            $modify = 0;

            if ($exm != null)
            {
                $exam          = LessonExam::query()->where('exm', $exm)->first();
                $questionTypes = QuestionType::all();
                $topics        = TopicGradeLesson::all();

                if ($exam->gradeId == 3)
                {
                    $lessons = GradeLesson::query()
                                          ->where('orientationCategoryId', $exam->orientationCategoryId)
                                          ->get();

                }

                else
                {
                    if ($exam->gradeId == 2)
                    {
                        $lessons = GradeLesson::query()
                                              ->where('orientationCategoryId', $exam->orientationCategoryId)
                                              ->whereIn('gradeId', [1, 2])
                                              ->get();
                    }

                    else
                    {
                        $lessons = GradeLesson::query()
                                              ->where('orientationCategoryId', $exam->orientationCategoryId)
                                              ->whereIn('gradeId', [1])
                                              ->get();
                    }
                }


                return view('admin.dashboard.question.formByExam', compact('exam', 'lessons', 'modify', 'questionTypes', 'topics'));
            }

            $gradeLessons = GradeLesson::all();

            return view('admin.dashboard.question.form', compact('gradeLessons', 'modify'));

        }


        public function add(Request $request)
        {

            $this->validate($request, [

                'topicGradeLesson' => 'required|exists:topic_grade_lesson,id',
                'gradeLesson'      => 'required',
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

                $checkIfExit = ExamGradeLesson::query()
                                              ->where('examId', $exam->id)
                                              ->where('gradeLessonId', $request->input('gradeLesson'))
                                              ->first();

                if (!$checkIfExit)
                {
                    $ExamGradeLesson = new ExamGradeLesson();

                    $ExamGradeLesson->gradeLessonId = $request->input('gradeLesson');
                    $ExamGradeLesson->examId        = $exam->id;

                    $ExamGradeLesson->save();
                }
            }


            return redirect()->back();
        }


        public function editShow($id)
        {

            $question = Question::query()->find($id);


            return $question;
        }


        public function remove($id)
        {
            $question = Question::query()->find($id);

            $question->delete();

            return redirect()->back()->with([ 'success' => 'سوال با نوفقیت حذف شد.']);
        }

    }
