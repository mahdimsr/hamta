<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\Lib\Lib;
    use App\model\OrientationCategory;
    use App\model\ExamGradeLesson;
    use App\model\Grade;
    use App\model\GradeLesson;
    use App\model\Lesson;
    use App\model\LessonExam;
    use App\model\Orientation;
    use App\model\Question;
    use App\model\QuestionExam;
    use App\model\QuestionType;
    use App\model\Topic;
    use App\model\TopicExam;
    use App\model\TopicGradeLesson;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Rule;
    use Morilog\Jalali\CalendarUtils;


    class LessonExamController extends Controller
    {


        public function exams()
        {

            $lessonExam = LessonExam::all();

            return view('admin.dashboard.lessonExam.exams', compact('lessonExam'));
        }


        public function addShow()
        {

            $modify = 0;

            $categories   = OrientationCategory::all();
            $orientations = Orientation::all();
            $grades       = Grade::all();

            return view('admin.dashboard.lessonExam.form', compact('modify', 'categories', 'orientations', 'grades'));
        }


        public function add(Request $request)
        {

            $this->validate($request, ['orientation' => 'required',
                                       'category'    => 'required',
                                       'grade'       => 'required',
                                       'title'       => 'required|string|max:20',
                                       'activeDate'  => 'required',
                                       'price'       => 'required|integer|min:0',
                                       'description' => 'nullable|string|max:300',
                                       'answerSheet' => 'nullable|file|mimes:pdf|max:3000',
                                       'duration'    => 'required|integer|min:0']);


            $lessonExam                        = new LessonExam();
            $lessonExam->orientationCategoryId = $request->input('category');
            $lessonExam->gradeId               = $request->input('grade');
            $lessonExam->title                 = $request->input('title');
            $lessonExam->price                 = $request->input('price');
            $lessonExam->description           = $request->input('description');
            // convert and insert activeDate
            $jalalian               = Lib::convertFaToEn($request->input('activeDate'));
            $dateTime               = CalendarUtils::createDatetimeFromFormat('Y/m/d', $jalalian);
            $carbon                 = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $lessonExam->activeDate = $carbon->toDateTimeString();
            //end activeDate section
            $lessonExam->duration = $request->input('duration');

            $lessonExam->save();

            //save answerSheet
            if ($request->hasFile('answerSheet'))
            {
                $answerSheet = $request->file('answerSheet');

                Storage::disk('lessonExam')->put($lessonExam->id, $answerSheet);

                $lessonExam->answerSheet = $answerSheet->hashName();

                $lessonExam->update();
            }

            //end answerSheet section

            return redirect()->route('admin_ltl_exams');
        }


        public function editShow($exm)
        {

            $modify = 1;

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            $grades       = Grade::all();
            $categories   = OrientationCategory::all();
            $orientations = Orientation::all();

            return view('admin.dashboard.lessonExam.form', compact('modify', 'lessonExam', 'categories', 'grades', 'orientations'));
        }


        public function edit(Request $request, $exm)
        {

            $this->validate($request, ['orientation' => 'required',
                                       'category'    => 'required',
                                       'grade'       => 'required',
                                       'title'       => 'required|string|max:20',
                                       'activeDate'  => 'required',
                                       'price'       => 'required|integer|min:0',
                                       'description' => 'nullable|string|max:300',
                                       'answerSheet' => 'nullable|file|mimes:pdf|max:3000',
                                       'duration'    => 'required|integer|min:0']);


            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            $lessonExam->orientationCategoryId = $request->input('category');
            $lessonExam->gradeId               = $request->input('grade');
            $lessonExam->title                 = $request->input('title');
            $lessonExam->price                 = $request->input('price');
            $lessonExam->description           = $request->input('description');
            // convert and insert activeDate
            $jalalian               = Lib::convertFaToEn($request->input('activeDate'));
            $dateTime               = CalendarUtils::createDatetimeFromFormat('Y/m/d', $jalalian);
            $carbon                 = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $lessonExam->activeDate = $carbon->toDateTimeString();
            //end activeDate section
            $lessonExam->duration = $request->input('duration');


            //save answerSheet
            if ($request->hasFile('answerSheet'))
            {
                $answerSheet = $request->file('answerSheet');

                Storage::disk('lessonExam')->put($lessonExam->id, $answerSheet);

                Storage::disk('lessonExam')->delete($lessonExam->id . '/' . $lessonExam->answerSheet);

                $lessonExam->answerSheet = $answerSheet->hashName();

            }

            //end answerSheet section

            $lessonExam->update();


            return redirect()->route('admin_ltl_exams');

        }


        public function remove($exm)
        {

            $exam = LessonExam::query()->where('exm',$exm)->first();

            $exam->delete();

            return redirect()->back();
        }


        public function questionsShow($exm)
        {
            $exam      = LessonExam::query()->where('exm',$exm)->first();
            $questions = QuestionExam::query()->where('examId',$exam->id)->get();

            return view('admin.dashboard.lessonExam.questions', compact('questions','exam'));
        }

        public function removeQuestion($id)
        {

            $exam = LessonExam::query()->where('id',$id)->first();

            $exam->delete();

            return redirect()->back();
        }

        public function addQuestionShow($exm)
        {

            $exam          = LessonExam::query()->where('exm', $exm)->first();
            $questionTypes = QuestionType::all();
            $topics        = TopicGradeLesson::all();

            if ($exam->gradeId == 3)
            {
                $lessons = GradeLesson::query()->where('orientationCategoryId', $exam->orientationCategoryId)->get();
            }

            else if ($exam->gradeId == 2)
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



            return view('admin.dashboard.lessonExam.question_form', compact('exam', 'lessons', 'questionTypes', 'topics'));

        }


        public function addQuestion(Request $request,$exm)
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

                $exam = LessonExam::query()->where('exm', $exm)->first();

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



            return redirect()->back();

        }

    }
