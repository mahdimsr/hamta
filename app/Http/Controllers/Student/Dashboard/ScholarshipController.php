<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\model\Scholarship;

class ScholarshipController extends Controller
{


    public function scholarship()
    {

        $student      = Auth::guard('student')->user();
        $scholarship  = $student->scholarship()->first();
        return view('student.dashboard.scholarship',compact('student','scholarship'));

    }

    public function submit(Request $request)
    {

        $student      = Auth::guard('student')->user();
        $scholarship  = $student->scholarship()->first();

        $this->validate($request,
            [
                'stdMessage'   =>  'Required|string|between:5,500'
            ]
        );

        if($student->isComplete==0)
        {
            return redirect()->back()->withErrors(['notComplete' => ['شما هنوز اطلاعات خود را تکمیل نکرده اید.']]);
        }

		if ($scholarship && $scholarship->status!='NOT-SEEN')
		{
            return redirect()->back();
        }

		if ($scholarship && $scholarship->status=='NOT-SEEN')
		{
            $scholarship->stdMessage=$request->input('stdMessage');
            $scholarship->update();
            return redirect()->back();
        }

        else
        {
            $scholarship = new Scholarship();

            $scholarship->studentId=Auth::guard('student')->id();
            $scholarship->stdMessage=$request->input('stdMessage');
            $scholarship->save();

            return redirect()->back();
        }

    }

}
