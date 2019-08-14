<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\model\City as City;
use App\model\Grade as Grade;
use App\model\Orientation as Orientation;


class DashboardController extends Controller
{

	public function profile()
	{
        $student=Auth::guard('student')->user();
        $cities=new City();
        $grades=new Grade();
        $orientations=new Orientation();

        $data['city']='';
        $data['grade']='';
        $data['orientation']='';

        if($student->isComplete==1)
        {
        $city_data=$cities->where('id', $student->city)->first();
        $grade_data=$grades->where('id', $student->grade)->first();
        $orientation_data=$orientations->where('id', $student->orientation)->first();
        $data['city']=$city_data->name;
        $data['grade']=$grade_data->title;
        $data['orientation']=$orientation_data->title;
        }

        $data['user']= $student;
        $data['cities']=$cities->all();
        $data['grades']=$grades->all();
        $data['orientations']=$orientations->all();
		return view('student.dashboard.profile',$data);
    }


    public function update(Request $request)
    {

        $student=Auth::guard('student')->user();
        $cities=new City();
        $orientations=new Orientation();
        $grades=new Grade();

        $this->validate($request,
        [
            'name'=>'required',
            'familyname'=>'required',
            'birthday'=>'required',
            'email'=>'required|email',
            'nationalcode'=>'required|digits:10',
            'city'=>'required',
            'address'=>'required',
            'orientation'=>'required',
            'grade'=>'required',
            'school'=>'required',
            'averageup'=>'required|digits_between:1,2|min:5|max:20|numeric',
            'averagedown'=>'required|digits:2|min:00|max:99|numeric',
            'telephone'=>'required|digits:8',
            'parentphone'=>'required|digits:11',
        ]
        );

        $city_data=$cities->where('name',$request->input('city'))->first();
        $grade_data=$grades->where('title',$request->input('grade'))->first();
        $state_data=$city_data->state()->first();
        $orientation_data=$orientations->where('title',$request->input('orientation'))->first();

        if($request->input('averageup')=='20')
        {
        $average=$request->input('averageup').'/00';
        }
        else
        {
        $average=$request->input('averageup').'/'.$request->input('averagedown');
        }

        $student->name=$request->input('name');
        $student->familyName=$request->input('familyname');
        $student->email=$request->input('email');
        $student->nationalCode=$request->input('nationalcode');
        $student->address=$request->input('address');
        $student->average=$average;
        $student->birthday=$request->input('birthday');
        $student->school=$request->input('school');
        $student->telePhone=$state_data->areaCode.' - '.$request->input('telephone');
        $student->parentPhone=$request->input('parentphone');
        $student->city=$city_data->id;
        $student->orientation=$orientation_data->id;
        $student->grade=$grade_data->id;
        $student->isComplete=1;
        $student->save();
        return redirect()->route('student_dashboard_profile');
    }


}
