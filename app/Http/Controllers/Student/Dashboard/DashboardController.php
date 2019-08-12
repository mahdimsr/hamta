<?php

namespace App\Http\Controllers\Student\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Student as Student;
use Illuminate\Support\Facades\Auth;
use App\model\City as City;
use App\model\State as State;
class DashboardController extends Controller
{
    public function __construct(Student $student,City $city,State $state)
    {
        $this->students=$student;
        $this->citys=$city->all();
        $this->states=$state->all();
    }
	public function profile()
	{
        $data=[];
        $id=Auth::guard('student')->id();
        $user = Auth::guard('student')->user();
        $student_data=$this->students->find($id);
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
        $data['average1']=substr($student_data->average, 0, 2);
        $data['average2']=substr($student_data->average, 3, 2);
        $data['update']=$user->isComplete;
        $data['citys']=$this->citys;
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
            'nationalcode'=>'required',
            'city'=>'required',
            'address'=>'required',
            'orientation'=>'required',
            'grade'=>'required',
            'school'=>'required',
            'average1'=>'required',
            'average2'=>'required',
            'telephone'=>'required',
            'parentphone'=>'required',
        ],
        [
            'name.required'=>'نام خود را وارد کنید.',
            'familyname.required'=>'نام خانوادگی خود را وارد کنید.',
            'birthday.required'=>'تاریح تولد خود را وارد کنید.',
            'email.required'=>'ایمیل خود را وارد کنید.',
            'email.required'=>'ایمیل وارد شده صحیح نیست.',
            'nationalcode.required'=>'کد ملی خود را وارد کنید.',
            'city.required'=>'شهر خود را انتخاب کنید.',
            'address.required'=>'آدرس خود را وارد کنید',
            'orientation.required'=>'گرایش خود را انتخاب کنید.',
            'grade.required'=>'مقطع تحصیلی خود را وارد کنید.',
            'school.required'=>'نام مدرسه خود را وارد کنید.',
            'average1.required'=>'عدد قبل از / را وارد کنید.',
            'average2.required'=>'عدد بعد از / را وارد کنید.',
            'telephone.required'=>'تلفن منزل را وارد کنید.',
            'parentphone.required'=>'تلفن یکی از والدین را وارد کنید.',
        ]
        );
        $id=Auth::guard('student')->id();
        $city_data=$this->citys->where('cityname',$request->input('city'))->first();
        $state_data=$this->states->find($city_data->stateid);
        $average=$request->input('average1').'/'.$request->input('average2');
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
        $student_data->state=$state_data->statename;
        $student_data->orientation=$request->input('orientation');
        $student_data->grade=$request->input('grade');
        $student_data->isComplete=1;
        $student_data->save();
        return redirect()->route('student_dashboard_profile');
    }

}
