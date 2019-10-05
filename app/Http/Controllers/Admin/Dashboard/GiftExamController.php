<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\Lib\Lib;
    use App\model\ExamGradeGift;
    use App\model\ExamGradeLesson;
    use App\model\GiftExam;
    use App\model\Grade;
    use App\model\GradeLesson;
    use App\model\LessonExam;
    use App\model\Orientation;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Storage;
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
                                       'answerSheet'  => 'nullable|file|mimes:pdf|max:3000',
                                       'duration'     => 'nullable|integer|min:0']);


            $giftExam              = new GiftExam();
            $giftExam->title       = $request->input('title');
            $giftExam->description = $request->input('description');
            $giftExam->duration    = $request->input('duration');
            // convert and insert activeDate

            $jalalian             = Lib::convertFaToEn($request->input('activeTime'));
            $dateTime             = CalendarUtils::createDatetimeFromFormat('Y/m/d', $jalalian);
            $carbon               = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $giftExam->activeTime = $carbon->toDateTimeString();

            //end activeDate section

            $giftExam->save();

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

                $examGradeGift                = new ExamGradeGift();
                $examGradeGift->examId        = $giftExam->id;
                $examGradeGift->gradeLessonId = $gradeLessonId;
                $examGradeGift->save();
            }


            return redirect()->route('admin_gift_exams');
        }


        public function remove($exm)
        {

            $exam = GiftExam::query()->where('exm', $exm)->first();

            $exam->delete();

            return redirect()->back();
        }

    }
