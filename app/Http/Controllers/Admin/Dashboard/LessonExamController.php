<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\model\Category;
    use App\model\OrientationCategory;
    use App\model\ExamGradeLesson;
    use App\model\Grade;
    use App\model\GradeLesson;
    use App\model\Lesson;
    use App\model\LessonExam;
    use App\model\Orientation;
    use App\model\QuestionExam;
    use App\model\Topic;
    use App\model\TopicExam;
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

            $categories        = Category::all();
            $orientations      = Orientation::all();
            $grades            = Grade::all();
            $gradeLessons      = GradeLesson::all();
            $topicGradeLessons = TopicGradeLesson::all();

            return view('admin.dashboard.lessonExam.form', compact('modify', 'categories', 'orientations', 'grades', 'gradeLessons', 'topicGradeLessons'));
        }


        public function add(Request $request)
        {

            $stepOne = Validator::make($request->only(['title', 'price', 'description']), [

                'title'       => 'required|string|max:20',
                'price'       => 'required|integer|min:0',
                'description' => 'nullable|string|max:300',

            ]);

            if ($stepOne->fails())
            {
                return redirect()->back()->withInput($request->all())->withErrors($stepOne->errors());
            }

            if ($request->input('itemType') == 'LESSON')
            {
                $stepThree = Validator::make($request->only(['gradeLessons']), [

                    'gradeLessons' => 'required',

                ]);
            }
            else
            {
                $stepThree = Validator::make($request->only(['gradeLesson', 'topics']), [

                    'gradeLesson' => 'required|exists:grade_lesson:id',
                    'topics'      => 'required|exists:topic_grade_lesson:id',

                ]);
            }


            if ($stepThree->fails())
            {

                return redirect()->back()->withInput($request->all())->withErrors($stepThree->errors());
            }


            $lessonExam = new LessonExam();

            $lessonExam->title       = $request->input('title');
            $lessonExam->price       = $request->input('price');
            $lessonExam->description = $request->input('description');
            $lessonExam->itemType    = $request->input('itemType');

            $lessonExam->save();

            if ($request->input('itemType') == 'LESSON')
            {
                foreach ($request->input('gradeLessons') as $gradeLessonId)
                {
                    $examGradeLesson = new ExamGradeLesson();

                    $examGradeLesson->examId        = $lessonExam->id;
                    $examGradeLesson->gradeLessonId = $gradeLessonId;

                    $examGradeLesson->save();
                }
            }
            else
            {
                foreach ($request->input('topics') as $topicGradeLessonId)
                {
                    $topicExam = new TopicExam();

                    $topicExam->lessonExamId       = $lessonExam->id;
                    $topicExam->topicGradeLessonId = $topicGradeLessonId;

                    $topicExam->save();
                }
            }


            return redirect()->route('admin_exams');
        }


        public function editShow($exm)
        {

            $modify = 1;

            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            $grades                = Grade::all();
            $orientationCategories = OrientationCategory::all();
            $orientations          = Orientation::all();
            $gradeLessons          = GradeLesson::all();
            $topicGradeLessons     = TopicGradeLesson::all();

            return view('admin.dashboard.lessonExam.form', compact('modify', 'lessonExam', 'gradeLessons', 'orientationCategories', 'grades', 'orientations', 'topicGradeLessons'));
        }


        public function addManyQuestion(Request $request)
        {

            $questionIds = $request->input('questionId');


            $exam = LessonExam::query()->where('exm', $request->input('exm'))->first();

            if (count($questionIds) > 0)
            {
                QuestionExam::query()->where('examId', $exam->id)->whereNotIn('questionId', $questionIds)->delete();
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
                else
                {
                    if (QuestionExam::query()->where('questionId', $questionId)->where('examId', $exam->id)->exists())
                    {
                        $questionExam
                            = QuestionExam::query()
                                          ->where('questionId', $questionId)
                                          ->where('examId', $exam->id)
                                          ->first()
                        ;

                        $questionExam->update();
                    }
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
