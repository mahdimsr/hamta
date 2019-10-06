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


        public function editShow($exm)
        {

            $modify = 1;

            $giftExam = GiftExam::query()->where('exm', $exm)->first();


            $gradeLessons = GradeLesson::all();
            $orientations = Orientation::all();

            return view('admin.dashboard.giftExam.form', compact('modify', 'giftExam', 'gradeLessons', 'orientations'));
        }


        public function edit(Request $request, $exm)
        {

            $this->validate($request, ['title'       => 'required|string|max:20',
                                       'activeTime'  => 'required',
                                       'description' => 'nullable|string|max:300',
                                       'answerSheet' => 'nullable|file|mimes:pdf|max:3000',
                                       'duration'    => 'nullable|integer|min:0']);


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

            $giftExam->update();

            //save answerSheet
            if ($request->hasFile('answerSheet'))
            {
                $answerSheet = $request->file('answerSheet');

                Storage::disk('giftExam')->put($giftExam->id, $answerSheet);

                Storage::disk('giftExam')->delete($giftExam->id . '/' . $giftExam->answerSheet);

                $giftExam->answerSheet = $answerSheet->hashName();

                $giftExam->update();
            }

            //end answerSheet section

            return redirect()->route('admin_gift_exams');

        }


        public function remove($exm)
        {

            $exam = GiftExam::query()->where('exm', $exm)->first();

            $exam->delete();

            return redirect()->back();
        }

    }
