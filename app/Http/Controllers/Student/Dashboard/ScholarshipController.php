<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\model\Scholarship;
use Image;

class ScholarshipController extends Controller
{


    public function scholarshipForm()
    {

        $student      = Auth::guard('student')->user();
        $scholarship  = Scholarship::query()->where('studentId',$student->id)->first();
        return view('student.dashboard.scholarship.form',compact('student','scholarship'));

    }

    public function scholarship(Request $request)
    {

        $student      = Auth::guard('student')->user();
        $scholarship  = Scholarship::query()->where('studentId',$student->id)->first();

        $this->validate($request,
            [
                'stdMessage'       =>  'Required|string|between:5,500',
                'scholarshipImage' =>  [Rule::requiredIf(empty($scholarship)),'image','max:1000'],
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

            if($request->hasFile('scholarshipImage'))
            {
            $image    = $request->file('scholarshipImage');
            Storage::disk('student')->putFileAs($student->id.'/scholarship',$image,$scholarship->verifyImage);
            $path                     = storage_path('app/public/students/'.$student->id.'/scholarship/'.$scholarship->verifyImage);
            $resizeImage              = Image::make($path)->resize(700,700,function($constraint)
            {
                $constraint->aspectRatio();
            });
            $resizeImage->save($path);
            }

            $scholarship->update();
            return redirect()->back();
        }

        else
        {
            $scholarship = new Scholarship();
            $scholarship->studentId=Auth::guard('student')->id();
            $scholarship->stdMessage=$request->input('stdMessage');

            $image    = $request->file('scholarshipImage');
            Storage::disk('student')->put($student->id.'/scholarship',$image);
            $scholarship->verifyImage = $image->hashName();
            $path                     = storage_path('app/public/students/'.$student->id.'/scholarship/'.$scholarship->verifyImage);
            $resizeImage              = Image::make($path)->resize(700,700,function($constraint)
            {
                $constraint->aspectRatio();
            });
            $resizeImage->save($path);

            $scholarship->save();
            return redirect()->back();
        }

    }

}
