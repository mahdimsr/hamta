<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class ProfileController extends Controller
    {

        public function myExams()
        {

            $student = Auth::user();

            $carts = Cart::query()->where('studentId', $student->id)->where('transactionId', '!=', 0)->get();

            $exams = [];

            foreach ($carts as $cart)
            {
                $exams[] = $cart->lessonExam;
            }


            return response()->json(['status' => ApiHelper::$statusType[ 'ok' ],
                                     'exams'  => $exams]);
        }

    }
