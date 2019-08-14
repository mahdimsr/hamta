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
    public function __construct(Student $student,City $city,State $state,Grade $grade,Orientation $orientation)
    {
        $this->students=$student;
        $this->cities=$city->all();
        $this->states=$state->all();
        $this->grades=$grade->all();
        $this->orientations=$orientation->all();
    }
	public function profile()
	{
        $data=[];
        $user = Auth::guard('student')->user();
        $student_data=$this->students->find($user->id);
        $data['name']=$student_data->name;
        $data['familyname']=$student_data->familyname;
        $data['birthday']=$student_data->birthday;
        $data['email']=$student_data->email;
        $data['nationalcode']=$student_data->nationalcode;
        $data['city']=$student_data->city;
        $data['address']=$student_data->address;
        $data['orientation']=$student_data->orientation;
        $data['grade']=$student_data->grade;
        $data['school']=$student_data->school;
        $data['telephone']=substr($student_data->telephone,6);
        $data['parentphone']=$student_data->parentphone;
        $data['averageup']=substr($student_data->average, 0, 2);
        $data['averagedown']=substr($student_data->average, 3, 2);
        $data['update']=$user->isComplete;
        $data['cities']=$this->cities;
        $data['grades']=$this->grades;
        $data['orientations']=$this->orientations;
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
        $id=Auth::guard('student')->id();
        $city_data=$this->cities->where('name',$request->input('city'))->first();
        $state_data=$this->states->find($city_data->stateid);

        if($request->input('averageup')=='20')
        {
        $average=$request->input('averageup').'/00';
        }
        else
        {
        $average=$request->input('averageup').'/'.$request->input('averagedown');
        }

        $student_data=$this->students->find($id);
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
