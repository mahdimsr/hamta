<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\LessonExam;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;


    class LessonExamController extends Controller
    {

        public function lessonExams()
        {

            $lessonExams = LessonExam::query()->paginate();

            return response()->json(['status'      => ApiHelper::$errorType[ 'ok' ],
                                     'dataList' => $lessonExams]);
        }

    }
