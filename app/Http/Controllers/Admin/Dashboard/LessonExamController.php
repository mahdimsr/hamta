<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\Lib\Lib;
    use App\model\ExamGradeLesson;
    use App\model\GradeLesson;
    use App\model\LessonExam;
    use App\model\Orientation;
    use App\model\Question;
    use App\model\QuestionExam;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\model\Lesson;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Rule;
    use Morilog\Jalali\CalendarUtils;
    use Image;


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


            $this->validate($request, ['title'              => 'required|string|max:20',
                                       'activeDate'         => 'required',
                                       'orientation_admin'  => 'required',
                                       'gradeLessons'       => 'required',
                                       'category'           => 'required',
                                       'answersheet'        => 'required|mimes:pdf|max:2000',
                                       'price'              => 'required|integer|min:0',
                                       'description'        => 'nullable|string|max:300',
                                       'duration'           => 'required|integer|min:0',]);


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

            if ($request->hasFile('answersheet'))
            {
                $answersheet = $request->file('answersheet');
                Storage::disk('lessonExam')->put($lessonExam->id . '/answersheet', $answersheet);
                $lessonExam->answersheet = $answersheet->hashName();

                $lessonExam->update();
            }

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
                                       'answersheet' => 'mimes:pdf|max:2000',
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

            if ($request->hasFile('answersheet'))
            {
                $answersheet = $request->file('answersheet');
                Storage::disk('lessonExam')->delete($lessonExam->id . '/answersheet/'. $lessonExam->answersheet);
                Storage::disk('lessonExam')->put($lessonExam->id . '/answersheet', $answersheet);
                $lessonExam->answersheet = $answersheet->hashName();

            }
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
                'description_question'  => 'required',
                'hardness'     => 'required|integer|between:0,6|digits:1',
                'text'         => 'required',
                'optionFour'   => 'required',
                'optionThree'  => 'required',
                'optionTwo'    => 'required',
                'optionOne'    => 'required',
                'answer'       => ['required', Rule::in(['1', '2', '3', '4'])],
                'photo'        => 'image|max:10000',
                'answerImage'  => 'image|max:10000',

            ]);


            $question = new Question();

            $question->gradeLessonId = $request->input('gradeLesson');
            $question->questionType  = $request->input('questionType');
            $question->description   = $request->input('description_question');
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
                $path                     = storage_path('app/public/questions/'.$question->id.'/photo/'.$question->photo);
                $resizeImage              = Image::make($path)->resize(700,700,function($constraint)
                {
                    $constraint->aspectRatio();
                });
                $resizeImage->save($path);

                $question->update();
            }


            if ($request->hasFile('answerImage'))
            {
                $answerImage = $request->file('answerImage');
                Storage::disk('question')->put($question->id . '/answerImage', $answerImage);
                $question->answerImage = $answerImage->hashName();
                $path                     = storage_path('app/public/questions/'.$question->id.'/answerImage/'.$question->answerImage);
                $resizeImage              = Image::make($path)->resize(700,700,function($constraint)
                {
                    $constraint->aspectRatio();
                });
                $resizeImage->save($path);

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
                'description_question'  => 'required',
                'hardness'     => 'required|integer|between:0,6|digits:1',
                'text'         => 'required',
                'optionFour'   => 'required',
                'optionThree'  => 'required',
                'optionTwo'    => 'required',
                'optionOne'    => 'required',
                'answer'       => ['required', Rule::in(['1', '2', '3', '4'])],
                'photo'        => 'image|max:10000',
                'answerImage'  => 'image|max:10000',

            ]);


            $question = Question::query()->where('id', $id)->first();

            $question->questionType = $request->input('questionType');
            $question->description  = $request->input('description_question');
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
                $path                     = storage_path('app/public/questions/'.$question->id.'/photo/'.$question->photo);
                $resizeImage              = Image::make($path)->resize(700,700,function($constraint)
                {
                    $constraint->aspectRatio();
                });
                $resizeImage->save($path);

                $question->update();
            }


            if ($request->hasFile('answerImage'))
            {
                $answerImage = $request->file('answerImage');
                Storage::disk('question')->delete($question->id . '/answerImage/' . $question->answerImage);
                Storage::disk('question')->put($question->id . '/answerImage', $answerImage);
                $question->answerImage = $answerImage->hashName();
                $path                     = storage_path('app/public/questions/'.$question->id.'/answerImage/'.$question->answerImage);
                $resizeImage              = Image::make($path)->resize(700,700,function($constraint)
                {
                    $constraint->aspectRatio();
                });
                $resizeImage->save($path);

                $question->update();
            }

            return redirect()->route('admin_ltlExams_questionsShow',['exm'=>$exm]);

        }

    }
