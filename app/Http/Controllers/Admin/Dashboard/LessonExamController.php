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
    use App\model\QuestionExam;
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

            //admin_exams => route

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


            return redirect()->route('admin_exams');

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
                        $questionExam = QuestionExam::query()
                                                    ->where('questionId', $questionId)
                                                    ->where('examId', $exam->id)
                                                    ->first();

                        $questionExam->update();
                    }
                }

            }


            return redirect()->back();
        }


        public function remove($id)
        {

            $exam = LessonExam::query()->find($id);

            $exam->delete();

            return redirect()->back();
        }

    }
