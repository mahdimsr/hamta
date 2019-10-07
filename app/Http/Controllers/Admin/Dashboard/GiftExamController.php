<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\Lib\Lib;
    use App\model\ExamGradeLesson;
    use App\model\GiftExam;
    use App\model\Grade;
    use App\model\GradeLesson;
    use App\model\Orientation;
    use App\model\Question;
    use App\model\QuestionExam;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Rule;
    use Morilog\Jalali\CalendarUtils;


    class GiftExamController extends Controller
    {

        public function exams()
        {

            $giftExams = GiftExam::all();

            return view('admin.dashboard.giftExam.exams', compact('giftExams'));
        }


        public function addShow()
        {

            $modify = 0;

            $orientations = Orientation::all();
            $grades       = Grade::all();
            $gradeLessons = GradeLesson::all();

            return view('admin.dashboard.giftExam.form', compact('modify', 'orientations', 'gradeLessons'));

        }


        public function add(Request $request)
        {


            $this->validate($request, ['title'        => 'required|string|max:20',
                                       'activeTime'   => 'required',
                                       'gradeLessons' => 'required',
                                       'description'  => 'nullable|string|max:300',
                                       'answerSheet'  => 'required|file|mimes:pdf|max:5000',
                                       'duration'     => 'nullable|integer|min:0',]);


            $giftExam              = new GiftExam();
            $giftExam->title       = $request->input('title');
            $giftExam->description = $request->input('description');
            $giftExam->duration    = $request->input('duration');
            // convert and insert activeDate-resultDate


            $persianDateTime      = Lib::convertFaToEn($request->input('activeTime'));
            $dateTime             = CalendarUtils::createCarbonFromFormat('Y/m/d H:i:s', $persianDateTime);
            $carbon               = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $giftExam->activeTime = $carbon->toDateTimeString();


            $persianDate          = Lib::convertFaToEn($request->input('resultDate'));
            $date                 = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon               = Carbon::createFromTimestamp($date->getTimestamp());
            $giftExam->resultDate = $carbon->toDateTimeString();

            $giftExam->save();
            //end activeDate section

            //save answerSheet
            if ($request->hasFile('answerSheet'))
            {
                $answerSheet = $request->file('answerSheet');

                Storage::disk('giftExam')->put($giftExam->id, $answerSheet);

                $giftExam->answerSheet = $answerSheet->hashName();

                $giftExam->update();
            }

            //end answerSheet section

            // insert relation
            foreach ($request->input('gradeLessons') as $gradeLessonId)
            {

                $examGradeGift                = new ExamGradeLesson();
                $examGradeGift->examId        = $giftExam->id;
                $examGradeGift->gradeLessonId = $gradeLessonId;
                $examGradeGift->type          = 'GIFT_EXAM';
                $examGradeGift->save();
            }


            return redirect()->route('admin_giftExams');
        }


        public function editShow($exm)
        {

            $modify = 1;
            $giftExam = GiftExam::query()->where('exm', $exm)->first();

            return view('admin.dashboard.giftExam.form', compact('modify', 'giftExam'));
        }

        public function edit(Request $request, $exm)
        {

            $this->validate($request, ['title'       => 'required|string|max:20',
                                       'activeTime'  => 'required',
                                       'description' => 'nullable|string|max:300',
                                       'answerSheet' => 'nullable|file|mimes:pdf|max:5000',
                                       'duration'    => 'nullable|integer|min:0',]);


            $giftExam              = GiftExam::query()->where('exm', $exm)->first();
            $giftExam->title       = $request->input('title');
            $giftExam->description = $request->input('description');
            $giftExam->duration    = $request->input('duration');
            // convert and insert activeDate-resultDate


            $persianDateTime      = Lib::convertFaToEn($request->input('activeTime'));
            $dateTime             = CalendarUtils::createCarbonFromFormat('Y/m/d H:i:s', $persianDateTime);
            $carbon               = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $giftExam->activeTime = $carbon->toDateTimeString();


            $persianDate          = Lib::convertFaToEn($request->input('resultDate'));
            $date                 = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon               = Carbon::createFromTimestamp($date->getTimestamp());
            $giftExam->resultDate = $carbon->toDateTimeString();

            //end activeDate section


            //save answerSheet
            if ($request->hasFile('answerSheet'))
            {
                $answerSheet = $request->file('answerSheet');

                Storage::disk('giftExam')->put($giftExam->id, $answerSheet);

                Storage::disk('giftExam')->delete($giftExam->id . '/' . $giftExam->answerSheet);

                $giftExam->answerSheet = $answerSheet->hashName();


            }

            $giftExam->update();
            //end answerSheet section

            return redirect()->route('admin_giftExams');

        }


        public function remove($exm)
        {

            $exam = GiftExam::query()->where('exm', $exm)->first();

            $exam->delete();

            return redirect()->back();
        }


        public function addQuestionShow($exm)
        {

            $modify = 0;
            $exam = GiftExam::query()->where('exm', $exm)->first();

            return view('admin.dashboard.giftExam.question_form', compact('modify', 'exam'));
        }

        public function editQuestionShow($exm, $id)
        {

            $modify   = 1;
            $question = Question::query()->where('id', $id)->first();
            $exam     = giftExam::query()->where('exm', $exm)->first();


            return view('admin.dashboard.giftExam.question_form', compact('exam', 'question', 'modify'));

        }

        public function questionsShow($exm)
        {

            $exam = GiftExam::query()->where('exm',$exm)->first();
            $questionExams = QuestionExam::query()->where('examId', $exam->id)->where('type','GIFT_EXAM')->get();

            return view('admin.dashboard.giftExam.questions', compact('exam'));
        }


        public function addQuestion(Request $request,$exm)
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



            //set image if exists
            if ($request->hasFile('image'))
            {
                $image = $request->file('image');

                Storage::disk('question')->put($question->id, $image);

                $question->image = $image->hashName();

            }

            $question->save();

            $giftExam = GiftExam::query()->where('exm',$exm)->first();

            $questionExam             = new QuestionExam();
            $questionExam->examId     = $giftExam->id;
            $questionExam->questionId = $question->id;
            $questionExam->type       = 'GIFT_EXAM';

            $questionExam->save();


            return redirect()->back();
        }


        public function removeQuestion($exm,$id)
        {
            $questionExam = QuestionExam::query()->find($id)->where('type','GIFT_EXAM');

            $questionExam->delete();

            return redirect()->back()->with([ 'success' => 'سوال فقط برای این آزمون حذف شد و در بانک سوالات وجود دارد.']);
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

            return redirect()->back();

        }

    }
