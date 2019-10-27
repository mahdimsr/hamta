<?php

    namespace App\Http\Controllers\Api\Student;

    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;


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

                    return response()->json(['status'       => 'ok',
                                             'access_token' => $tokenResult->accessToken,
                                             'token_type'   => 'Bearer',
                                             'student'      => $student,
                                             'expires_at'   => Carbon::parse($tokenResult->token->expires_at)
                                                                     ->toDateTimeString()]);
                }
                else
                {
                    return response()->json(['status'  => 'error',
                                             'message' => 'شماره یا رمز عبور اشتباه وارد شده']);
                }
            }


        }

    }
