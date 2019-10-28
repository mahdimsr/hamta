<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\Lib\Lib;
    use App\model\ExamGradeLesson;
    use App\model\GradeLesson;
    use App\model\LessonExam;
    use App\model\Orientation;
    use App\model\Question;
    use App\model\QuestionExam;
    use App\model\ExamCode;
    use App\model\Discount;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\model\Lesson;
    use Illuminate\Support\Facades\Storage;
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

            $modify       = 0;
            $orientations = Orientation::all();
            $gradeLessons = GradeLesson::all();
            $categories   = Lesson::query()->where('parentId', 0)->get();

            return view('admin.dashboard.lessonExam.form', compact('modify', 'orientations', 'gradeLessons', 'categories'));
        }


        public function add(Request $request)
        {


            $this->validate($request, ['title'        => 'required|string|max:20',
                                       'activeDate'   => 'required',
                                       'orientation'  => 'required',
                                       'gradeLessons' => 'required',
                                       'category'     => 'required',
                                       'price'        => 'required|integer|min:0',
                                       'description'  => 'nullable|string|max:300',
                                       'duration'     => 'required|integer|min:0',]);


            $lessonExam              = new LessonExam();
            $lessonExam->title       = $request->input('title');
            $lessonExam->price       = $request->input('price');
            $lessonExam->description = $request->input('description');
            $lessonExam->duration    = $request->input('duration');
            // convert and insert activeDate

            $jalalian               = Lib::convertFaToEn($request->input('activeDate'));
            $dateTime               = CalendarUtils::createDatetimeFromFormat('Y/m/d', $jalalian);
            $carbon                 = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $lessonExam->activeDate = $carbon->toDateTimeString();

            $lessonExam->save();
            //end activeDate section


            // insert relation
            foreach ($request->input('gradeLessons') as $gradeLessonId)
            {

                $examGradeLesson                = new ExamGradeLesson();
                $examGradeLesson->examId        = $lessonExam->id;
                $examGradeLesson->gradeLessonId = $gradeLessonId;
                $examGradeLesson->type          = 'LESSON_EXAM';
                $examGradeLesson->save();
            }

            //end answerSheet section

            return redirect()->route('admin_ltlExams');
        }


        public function editShow($exm)
        {

            $modify     = 1;
            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            return view('admin.dashboard.lessonExam.form', compact('modify', 'lessonExam'));
        }


        public function edit(Request $request, $exm)
        {

            $this->validate($request, ['title'       => 'required|string|max:20',
                                       'activeDate'  => 'required',
                                       'price'       => 'required|integer|min:0',
                                       'description' => 'nullable|string|max:300',
                                       'duration'    => 'required|integer|min:0']);


            $lessonExam = LessonExam::query()->where('exm', $exm)->first();

            $lessonExam->title       = $request->input('title');
            $lessonExam->price       = $request->input('price');
            $lessonExam->description = $request->input('description');
            // convert and insert activeDate
            $jalalian               = Lib::convertFaToEn($request->input('activeDate'));
            $dateTime               = CalendarUtils::createDatetimeFromFormat('Y/m/d', $jalalian);
            $carbon                 = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $lessonExam->activeDate = $carbon->toDateTimeString();
            //end activeDate section
            $lessonExam->duration = $request->input('duration');


            //end answerSheet section

            $lessonExam->update();


            return redirect()->route('admin_ltlExams');

        }


        public function remove($exm)
        {

            $exam = LessonExam::query()->where('exm', $exm)->first();

            $exam->delete();

            return redirect()->back();
        }


        public function questionsShow($exm)
        {

            $exam          = LessonExam::query()->where('exm', $exm)->first();
            $questionExams = QuestionExam::query()->where('examId', $exam->id)->where('type', 'LESSON_EXAM')->get();

            return view('admin.dashboard.lessonExam.questions', compact('questionExams', 'exam'));
        }


        public function removeQuestion($exm, $id)
        {

            $questionExam = QuestionExam::query()->where('id', $id)->where('type', 'LESSON_EXAM')->first();

            $questionExam->delete();

            return redirect()->back();
        }


        public function addQuestionShow($exm)
        {

            $modify = 0;
            $exam   = LessonExam::query()->where('exm', $exm)->first();


            return view('admin.dashboard.lessonExam.question_form', compact('exam', 'modify'));

        }


        public function editQuestionShow($exm, $id)
        {

            $modify   = 1;
            $question = Question::query()->where('id', $id)->first();
            $exam     = LessonExam::query()->where('exm', $exm)->first();


            return view('admin.dashboard.lessonExam.question_form', compact('exam', 'question', 'modify'));

        }


        public function addQuestion(Request $request, $exm)
        {


            $this->validate($request, [

                'gradeLesson'  => 'required',
                'questionType' => 'nullable',
                'description'  => 'required',
                'hardness'     => 'required|integer|between:0,6|digits:1',
                'text'         => 'required',
                'optionFour'   => 'required',
                'optionThree'  => 'required',
                'optionTwo'    => 'required',
                'optionOne'    => 'required',
                'answer'       => ['required', Rule::in(['1', '2', '3', '4'])],
                'photo'        => 'image',
                'answerImage'  => 'image|max:1000',

            ]);


            $question = new Question();

            $question->gradeLessonId = $request->input('gradeLesson');
            $question->questionType  = $request->input('questionType');
            $question->description   = $request->input('description');
            $question->text          = $request->input('text');
            $question->optionOne     = $request->input('optionOne');
            $question->optionTwo     = $request->input('optionTwo');
            $question->optionThree   = $request->input('optionThree');
            $question->optionFour    = $request->input('optionFour');
            $question->answer        = $request->input('answer');
            $question->hardness      = $request->input('hardness');

            $question->save();

            // store images
            if ($request->hasFile('photo'))
            {
                $photo = $request->file('photo');

                Storage::disk('question')->put($question->id . '/photo', $photo);

                $question->photo = $photo->hashName();

                $question->update();
            }


            if ($request->hasFile('answerImage'))
            {
                $answerImage = $request->file('answerImage');

                Storage::disk('question')->put($question->id . '/answerImage', $answerImage);

                $question->answerImage = $answerImage->hashName();

                $question->update();
            }


            $exam = LessonExam::query()->where('exm', $exm)->first();

            $questionExam = new QuestionExam();

            $questionExam->questionId = $question->id;
            $questionExam->examId     = $exam->id;
            $questionExam->type       = 'LESSON_EXAM';

            $questionExam->save();


            return redirect()->back();

        }


        public function editQuestion(Request $request, $exm, $id)
        {


            $this->validate($request, [

                'questionType' => 'nullable',
                'description'  => 'required',
                'hardness'     => 'required|integer|between:0,6|digits:1',
                'text'         => 'required',
                'optionFour'   => 'required',
                'optionThree'  => 'required',
                'optionTwo'    => 'required',
                'optionOne'    => 'required',
                'answer'       => ['required', Rule::in(['1', '2', '3', '4'])],
                'photo'        => 'image',
                'answerImage'  => 'image|max:1000',

            ]);


            $question = Question::query()->where('id', $id)->first();

            $question->questionType = $request->input('questionType');
            $question->description  = $request->input('description');
            $question->text         = $request->input('text');
            $question->optionOne    = $request->input('optionOne');
            $question->optionTwo    = $request->input('optionTwo');
            $question->optionThree  = $request->input('optionThree');
            $question->optionFour   = $request->input('optionFour');
            $question->answer       = $request->input('answer');
            $question->hardness     = $request->input('hardness');

            $question->update();


            // store images
            if ($request->hasFile('photo'))
            {
                $photo = $request->file('photo');

                Storage::disk('question')->delete($question->id . '/photo/' . $question->photo);

                Storage::disk('question')->put($question->id . '/photo', $photo);

                $question->photo = $photo->hashName();

                $question->update();
            }


            if ($request->hasFile('answerImage'))
            {
                $answerImage = $request->file('answerImage');

                Storage::disk('question')->delete($question->id . '/answerImage/' . $question->answerImage);

                Storage::disk('question')->put($question->id . '/answerImage', $answerImage);

                $question->answerImage = $answerImage->hashName();

                $question->update();
            }

            return redirect()->back();

        }


        public function discounts($exm)
        {

            $lessonExam    = LessonExam::where('exm', $exm)->first();
            $examDiscounts = ExamCode::where('examId', $lessonExam->id)->get();


            return view('admin.dashboard.lessonExam.discounts', compact('examDiscounts', 'exm'));
        }


        public function discountAddShow($exm)
        {

            $modify = 0;

            return view('admin.dashboard.lessonExam.discount_form', compact('modify', 'exm'));
        }


        public function discountAdd(Request $request, $exm)
        {

            $lessonExam = LessonExam::where('exm', $exm)->first();

            $this->validate($request, ['code'    => 'required|string|max:8|unique:discount,code',
                                       'value'   => 'required|numeric|min:0|max:100',
                                       'endDate' => 'required']);

            $discount = new Discount();

            $discount->code  = $request->input('code');
            $discount->value = $request->input('value');
            $discount->count = 1;
            $discount->type  = 'LESSONEXAM-OFF';

            //convert endDate
            $persianDate       = Lib::convertFaToEn($request->input('endDate'));
            $date              = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon            = Carbon::createFromTimestamp($date->getTimestamp());
            $discount->endDate = $carbon->toDateTimeString();

            $discount->save();

            $examCode = new ExamCode();

            $examCode->examId     = $lessonExam->id;
            $examCode->discountId = $discount->id;
            $examCode->save();

            return redirect()->back();
        }


        public function discountEditShow($exm, $discountId)
        {

            $modify   = 1;
            $discount = Discount::query()->find($discountId);

            return view('admin.dashboard.lessonExam.discount_form', compact('modify', 'exm', 'discount'));
        }


        public function discountEdit(Request $request, $exm, $discountId)
        {

            $discount = Discount::where('id', $discountId)->first();

            $this->validate($request, ['code'    => ['required',
                                                     'string',
                                                     'max:8',
                                                     Rule::unique('discount', 'code')->ignore($discount)],
                                       'value'   => 'required|numeric|min:0|max:100',
                                       'endDate' => 'required']);

            $discount->code  = $request->input('code');
            $discount->value = $request->input('value');
            $discount->count = 1;

            //convert endDate
            $persianDate       = Lib::convertFaToEn($request->input('endDate'));
            $date              = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon            = Carbon::createFromTimestamp($date->getTimestamp());
            $discount->endDate = $carbon->toDateTimeString();

            $discount->save();

            return redirect()->back();
        }


        public function discountRemove($exm, $discountId)
        {

            $discount = Discount::query()->find($discountId);

            $discount->delete();

            return redirect()->back();
        }

    }
