<?php

    namespace App\Http\Controllers\Api\Student;

    use App\model\Student;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Laravel\Passport\Passport;


    class AuthController extends Controller
    {

        public function login(Request $request)
        {

            $v = Validator::make($request->all(), [

                'mobile'   => 'required',
                'password' => 'required'

            ]);

            if ($v->fails())
            {
                return response()->json(['status' => 'inputError', 'errors' => $v->errors()]);
            }
            else
            {
                if (Auth::attempt(['mobile'   => $request->input('mobile'),
                                   'password' => $request->input('password'),], false))
                {
                    $student = $request->user();

                    $tokenResult = $student->createToken('Personal Access Token');
                    $token       = $tokenResult->token;
                    $token->save();

                    return response()->json(['status'       => 'OK',
                                             'access_token' => $tokenResult->accessToken,
                                             'token_type'   => 'Bearer',
                                             'student'      => $student,
                                             'expires_at'   => Carbon::parse($tokenResult->token->expires_at)
                                                                     ->toDateTimeString()]);
                }
                else
                {
                    return response()->json(['status'  => 'ERROR',
                                             'message' => 'شماره یا رمز عبور اشتباه وارد شده']);
                }
            }


        }


        public function register(Request $request)
        {

            $v = Validator::make($request->all(), [

                'mobile'         => 'required_without:email|unique:student,mobile',
                'email'          => 'required_without:mobile|unique:student,email',
                'password'       => 'required',
                'repeatPassword' => 'same:password'

            ]);

            if ($v->fails())
            {
                return response()->json(['status' => 'ERROR-INPUT', 'error' => $v->errors()]);
            }

            $student = new Student();

            $student->mobile   = $request->input('mobile');
            $student->password = Hash::make($request->input('password'));

            $student->save();

            $tokenResult = $student->createToken('Personal Access Token');
            $token       = $tokenResult->token;
            $token->save();

            return response()->json(['status'       => 'OK',
                                     'access_token' => $tokenResult->accessToken,
                                     'token_type'   => 'Bearer',
                                     'student'      => $student]);

        }

    }
