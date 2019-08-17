<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\model\Scholarship as Scholarship;

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
        $scholarship=new Scholarship();
        $scholarship->studentId=Auth::guard('student')->id();
        $scholarship->stdMessage=$request->input('stdMessage');
        $scholarship->save();
        return redirect()->route('student.dashboard.scholarship');
    }

}
