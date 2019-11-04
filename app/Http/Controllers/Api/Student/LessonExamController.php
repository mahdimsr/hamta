<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Grade;
    use App\model\LessonExam;
    use App\model\Orientation;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;


    class LessonExamController extends Controller
    {

        public function lessonExams(Request $request)
        {

            $lessonExams = null;



            $grade = Grade::query()->where('url', $request->input('gradeUrl'))->first();

            $orientation = Orientation::query()->where('url', $request->input('orientationUrl'))->first();



            if ($request->has('gradeUrl') || $request->has('orientationUrl'))
            {
                $lessonExams = LessonExam::filterExam($grade, $orientation);

            }
            else
            {
                $lessonExams = LessonExam::query()->paginate();

            }


            return response()->json(['status'   => ApiHelper::$statusType[ 'ok' ],
                                     'dataList' => $lessonExams]);
        }

    }
