<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\Lib\Lib;
    use App\model\City;
    use App\model\Province;
    use App\model\Grade;
    use App\model\Orientation;
    use App\model\Student;
    use App\model\Discount;
    use App\model\StudentCode;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Validation\Rule;
    use Morilog\Jalali\CalendarUtils;
    use Illuminate\Support\Facades\Hash;



    class StudentController extends Controller
    {

        public function students()
        {

            $students = Student::query()->where('isComplete', 1)->get();

            return view('admin.dashboard.student.students', compact('students'));
        }

        public function editShow($id)
        {

            $student      = Student::query()->where('id', $id)->first();
            $grades       = Grade::all();
            $orientations = Orientation::all();
            $cities       = City::all();
            $provinces    = Province::all();


            return view('admin.dashboard.student.form', compact('student', 'grades', 'orientations', 'cities', 'provinces'));
        }


        public function edit(Request $request, $id)
        {

            $student = Student::query()->where('id', $id)->first();

            $this->validate($request, ['name_admin'         => 'required',
                                       'familyName_admin'   => 'required',
                                       'birthday_admin'     => 'required',
                                       'email_admin'        => ['nullable',
                                                          'email',
                                                          Rule::unique('student', 'email')->ignore($student)],
                                       'nationalCode_admin' => ['required',
                                                          'digits:10',
                                                          Rule::unique('student', 'nationalCode')->ignore($student)],
                                       'city_admin'         => 'required|exists:city,id',
                                       'province_admin'     => 'required',
                                       'address_admin'      => 'required|string|max:200',
                                       'orientation_admin'  => 'required|exists:orientation,id',
                                       'grade_admin'        => 'required|exists:grade,id',
                                       'school_admin'       => 'nullable',
                                       'averageUp_admin'    => 'required|digits_between:1,2|min:5|max:20|numeric',
                                       'averageDown_admin'  => 'required|digits:2|min:00|max:99|numeric',
                                       'telePhone_admin'    => 'nullable|digits:8',
                                       'parentPhone_admin'  => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
                                       'student_mobile_edit_admin' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/',Rule::unique('student', 'mobile')->ignore($student)],
                                       'newPassword'       	      => ['nullable','confirmed',Rule::requiredIf($request->input('newPassword_confirmation') != null)],
                                       'newPassword_confirmation' => ['nullable',Rule::requiredIf($request->input('newPassword') != null)],
                                       ]);


            if ($request->input('averageUp_admin') == '20')
            {
                $average = $request->input('averageUp_admin') . '/00';
            }
            else
            {
                $average = $request->input('averageUp_admin') . '/' . $request->input('averageDown_admin');
            }

            $student->name         = $request->input('name_admin');
            $student->familyName   = $request->input('familyName_admin');
            $student->email        = $request->input('email_admin');
            $student->nationalCode = $request->input('nationalCode_admin');
            $student->address      = $request->input('address_admin');
            $student->average      = $average;

            // convert and insert birthday
            $Jalalian          = Lib::convertFaToEn($request->input('birthday_admin'));
            $dateTime          = CalendarUtils::createDatetimeFromFormat('Y/m/d', $Jalalian);
            $carbon            = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $student->birthday = $carbon->toDateTimeString();
            //end birthday section

            $student->school        = $request->input('school_admin');
            $student->telePhone     = $request->input('telePhone_admin');
            $student->parentPhone   = $request->input('parentPhone_admin');
            $student->mobile        = $request->input('student_mobile_edit_admin');
            $student->cityId        = $request->input('city_admin');
            $student->orientationId = $request->input('orientation_admin');
            $student->gradeId       = $request->input('grade_admin');

            if($request->has('newPassword'))
            {
                $student->password = Hash::make($request->input('newPassword'));
            }

            $student->update();

            return redirect()->route('admin_students');
        }

        public function discounts($id)
        {

            $studentDiscounts = StudentCode::where('studentId',$id)->get();


            return view('admin.dashboard.student.discounts', compact('studentDiscounts','id'));
        }

        public function discountAddShow($id)
        {
            $modify         = 0;

            return view('admin.dashboard.student.discount_form', compact('modify','id'));
        }

        public function discountAdd(Request $request,$id)
        {

            $this->validate($request, ['code'    => 'required|string|max:8|unique:discount,code',
                                       'value'   => 'required|numeric|min:0|max:100',
                                       'count'   => 'required|numeric|min:1|max:20',
                                       'endDate' => 'required']);

            $discount = new Discount();

            $discount->code  = $request->input('code');
            $discount->value = $request->input('value');
            $discount->count = $request->input('count');
            $discount->type  = 'STUDENT-OFF';

            //convert endDate
            $persianDate       = Lib::convertFaToEn($request->input('endDate'));
            $date              = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon            = Carbon::createFromTimestamp($date->getTimestamp());
            $discount->endDate = $carbon->toDateTimeString();

            $discount->save();

            $studentCode = new StudentCode();

            $studentCode->studentId  = $id;
            $studentCode->discountId = $discount->id;
            $studentCode->save();

            return redirect()->route('admin_students_discounts',['id'=>$id]);
        }

        public function discountEditShow($id,$discountId)
        {
            $modify         = 1;
            $discount       = Discount::query()->find($discountId);

            return view('admin.dashboard.student.discount_form', compact('modify','id','discount'));
        }

        public function discountEdit(Request $request,$id,$discountId)
        {

            $discount = Discount::where('id',$discountId)->first();

            $this->validate($request, ['code'    => ['required', 'string', 'max:8',
                                       Rule::unique('discount', 'code')->ignore($discount)],
                                       'value'   => 'required|numeric|min:0|max:100',
                                       'count'   => 'required|numeric|min:1|max:20',
                                       'endDate' => 'required']);

            $discount->code  = $request->input('code');
            $discount->value = $request->input('value');
            $discount->count = $request->input('count');

            //convert endDate
            $persianDate       = Lib::convertFaToEn($request->input('endDate'));
            $date              = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon            = Carbon::createFromTimestamp($date->getTimestamp());
            $discount->endDate = $carbon->toDateTimeString();

            $discount->save();

            return redirect()->route('admin_students_discounts',['id'=>$id]);
        }

        public function discountRemove($id,$discountId)
        {
            $discount = Discount::query()->find($discountId);

            $discount->delete();

            return redirect()->back();
        }

    }
