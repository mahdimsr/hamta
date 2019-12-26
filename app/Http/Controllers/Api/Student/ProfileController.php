<?php

    namespace App\Http\Controllers\Api\Student;

    use App\Http\Controllers\Api\ApiHelper;
    use App\model\Cart;
    use App\model\Discount;
    use App\model\Grade;
    use App\model\Orientation;
    use App\model\StudentCode;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Rule;


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


        public function myProfile()
        {

            $grades      = Grade::all();
            $orientation = Orientation::all();
            $student     = Auth::user();

            return response()->json(['status'       => ApiHelper::$statusType[ 'ok' ],
                                     'grades'       => $grades,
                                     'orientations' => $orientation,
                                     'student'      => $student]);
        }


        public function updateMyProfile(Request $request)
        {

            $student = Auth::user();

            $v = Validator::make($request->all(), [

                'name'          => 'required',
                'family'        => 'required',
                'nationalCode'  => [Rule::requiredIf(!$student->isComplete), 'unique:student,nationalCode'],
                'gradeId'       => 'required',
                'orientationId' => 'required'

            ]);

            if ($v->fails())
            {
                return response()->json(['status' => ApiHelper::$statusType[ 'validation' ],
                                         'errors' => $v->errors()]);
            }
            else
            {

                $student->name          = $request->input('name');
                $student->familyName    = $request->input('family');
                $student->nationalCode  = $request->input('nationalCode');
                $student->gradeId       = $request->input('gradeId');
                $student->orientationId = $request->input('orientationId');
                $student->isComplete    = true;

                $student->update();

                return response()->json(['status'  => ApiHelper::$statusType[ 'ok' ],
                                         'student' => $student]);
            }

        }


        public function discountCodes()
        {

            $student = Auth::user();

            $studentCodes = StudentCode::query()->where('studentId', $student->id)->get();

            $discounts = [];

            foreach ($studentCodes as $item)
            {
                $discounts[] = $item->discount;
            }

            return response()->json(['status'    => ApiHelper::$statusType[ 'ok' ],
                                     'discounts' => $discounts]);
        }

    }
