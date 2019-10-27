<?php

    namespace App\Http\Controllers\Api\Student;

    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;


    class AuthController extends Controller
    {

        public function login(Request $request)
        {

            if (Auth::attempt(['mobile'   => $request->input('mobile'),
                               'password' => $request->input('password'),], false))
            {
                $student = $request->user();

                $tokenResult = $student->createToken('Personal Access Token');
                $token       = $tokenResult->token;
                $token->save();

                return response()->json(['access_token' => $tokenResult->accessToken,
                                         'token_type'   => 'Bearer',
                                         'expires_at'   => Carbon::parse($tokenResult->token->expires_at)
                                                                 ->toDateTimeString()]);
            }
            else
            {
                return 'unAuthorize';
            }
        }

    }
