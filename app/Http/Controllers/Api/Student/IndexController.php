<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class IndexController extends Controller
    {

        public function checkUpdate(Request $request)
        {

            $version     = '1.0';
            $title       = 'نسخه اول';
            $message
                         = 'این نسخه اولین انتشار اپلیکیشن سامانه است و امکان داره که مشکلاتی داشته باشه. از بابت مشلات پیش آمده معذرت میخواهیم و در اولین فرصت سعی میکنیم که برطرفشون کنیم.';
            $hasUpdate   = false;
            $forceUpdate = false;

            return response()->json(['status'      => ApiHelper::$statusType[ 'ok' ],
                                     'version'     => $version,
                                     'title'       => $title,
                                     'message'     => $message,
                                     'hasUpdate'   => $hasUpdate,
                                     'forceUpdate' => $forceUpdate]);
        }


        public function index()
        {

            $student = Auth::guard('api')->user();

            $cartCount = Cart::query()->where('studentId', '=', $student->id)->where('transactionId', '=', 0)->count();

            $images = ['lessonExam'  => asset('image/student/dashboard/exam-lesson.jpg'),
                       'giftExam'    => asset('image/student/dashboard/gift-exam.jpg'),
                       'generalExam' => asset('image/student/dashboard/General-exam.jpg'),
                       'scholarship' => asset('image/student/dashboard/scholarship3.jpg'),
                       'onlineClass' => asset('image/student/dashboard/Online-class.jpg'),
                       'meAndThe'    => asset('image/student/dashboard/me-and-the.jpg'),
                       'books'       => asset('image/student/dashboard/Books.jpg'),
                       'untilKonkur' => asset('image/student/dashboard/to-konkor.jpg'),
                       'teacher'     => asset('image/student/dashboard/Teacher.jpg'),
                       'discussion'  => asset('image/student/dashboard/discussion.jpg'),
                       'game'        => asset('image/student/dashboard/game1.jpg'),];


            return response()->json(['status'    => ApiHelper::$statusType[ 'ok' ],
                                     'cartCount' => $cartCount,
                                     'itemPhoto' => $images,
                                     'student'   => $student]);
        }


    }
