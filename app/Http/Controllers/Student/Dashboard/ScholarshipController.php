<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\model\Scholarship as Scholarship;

class ScholarshipController extends Controller
{
    //

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
                'stdMessage'   =>  'Required|string|between:10,500'
            ]
        );

		$studentId = ['stdMessage' => $student->id];

        $validator = Validator::make($studentId,
        [
			'stdMessage' => 'unique:scholarship,studentId',
        ],
        [
			'stdMessage.unique' => 'شما قبلا درخواست بورسیه داده اید.',
        ]
        );

        if($student->isComplete==0)
        {
            return redirect()->back()->withErrors(['notComplete' => ['شما هنوز اطلاعات خود را تکمیل نکرده اید.']]);
        }

		if ($validator->fails() && $scholarship->status!='NOT-SEEN')
		{
			return redirect()->back()->with(['errors' => $validator->errors()]);
		}

		else if ($validator->fails() && $scholarship->status=='NOT-SEEN')
		{
            $scholarship->stdMessage=$request->input('stdMessage');
            $scholarship->update();
            return redirect()->route('student_dashboard_scholarship');
        }

        else
        {

            $scholarship=new Scholarship();
            $scholarship->studentId=Auth::guard('student')->id();
            $scholarship->stdMessage=$request->input('stdMessage');
            $scholarship->save();
            return redirect()->route('student_dashboard_scholarship');

        }

    }

}
