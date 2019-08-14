<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Student as Student;
use Illuminate\Support\Facades\Auth;
use App\model\City as City;
use App\model\State as State;
use App\model\Grade as Grade;
use App\model\Orientation as Orientation;
class DashboardController extends Controller
{

	public function profile()
	{
        $data=[];
        $cities=new City();
        $grades=new Grade();
        $orientations=new Orientation();
        $data['user']= Auth::guard('student')->user();
        $data['cities']=$cities->all();
        $data['grades']=$grades->all();
        $data['orientations']=$orientations->all();
		return view('student.dashboard.profile',$data);
    }


    public function update(Request $request)
    {
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

        $cities=new City;
        $student=new Student();
        $id=Auth::guard('student')->id();
        $city_data=$cities->where('name',$request->input('city'))->first();
        $state_data=$city_data->state()->first();

        if($request->input('averageup')=='20')
        {
        $average=$request->input('averageup').'/00';
        }
        else
        {
        $average=$request->input('averageup').'/'.$request->input('averagedown');
        }

        $student_data=$student->find($id);
        $student_data->name=$request->input('name');
        $student_data->familyname=$request->input('familyname');
        $student_data->email=$request->input('email');
        $student_data->nationalcode=$request->input('nationalcode');
        $student_data->address=$request->input('address');
        $student_data->average=$average;
        $student_data->birthday=$request->input('birthday');
        $student_data->school=$request->input('school');
        $student_data->telephone=$state_data->areacode.' - '.$request->input('telephone');
        $student_data->parentphone=$request->input('parentphone');
        $student_data->city=$request->input('city');
        $student_data->state=$state_data->name;
        $student_data->orientation=$request->input('orientation');
        $student_data->grade=$request->input('grade');
        $student_data->isComplete=1;
        $student_data->save();
        return redirect()->route('student_dashboard_profile');
    }


}
