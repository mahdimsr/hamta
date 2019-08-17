<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    //

    public function scholarship()
    {

        $student      = Auth::guard('student')->user();
        return view('student.dashboard.scholarship',compact('student'));

    }

    public function submit(Request $request)
    {
        $this->validate($request,
            [
                'stdMessage'   =>  'Required|string|between:10,500'
            ]
        );
    }

}
