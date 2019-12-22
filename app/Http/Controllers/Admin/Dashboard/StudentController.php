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

            $this->validate($request, ['name'         => 'required',
                                       'familyName'   => 'required',
                                       'birthday'     => 'required',
                                       'email'        => ['required',
                                                          'email',
                                                          Rule::unique('student', 'email')->ignore($student)],
                                       'nationalCode' => ['required',
                                                          'digits:10',
                                                          Rule::unique('student', 'nationalCode')->ignore($student)],
                                       'city'         => 'required|exists:city,id',
                                       'province'     => 'required',
                                       'address'      => 'required|string|max:200',
                                       'orientation'  => 'required|exists:orientation,id',
                                       'grade'        => 'required|exists:grade,id',
                                       'school'       => 'required',
                                       'averageUp'    => 'required|digits_between:1,2|min:5|max:20|numeric',
                                       'averageDown'  => 'required|digits:2|min:00|max:99|numeric',
                                       'telePhone'    => 'required|digits:8',
                                       'parentPhone'  => ['required', 'digits:11', 'regex:/^(\+98|0)?9\d{9}$/'],
                                       'student_mobile_edit' => ['required','digits:11','regex:/^(\+98|0)?9\d{9}$/',Rule::unique('student', 'mobile')->ignore($student)],
                                       ]);


            if ($request->input('averageUp') == '20')
            {
                $average = $request->input('averageUp') . '/00';
            }
            else
            {
                $average = $request->input('averageUp') . '/' . $request->input('averageDown');
            }

            $student->name         = $request->input('name');
            $student->familyName   = $request->input('familyName');
            $student->email        = $request->input('email');
            $student->nationalCode = $request->input('nationalCode');
            $student->address      = $request->input('address');
            $student->average      = $average;

            // convert and insert birthday
            $Jalalian          = Lib::convertFaToEn($request->input('birthday'));
            $dateTime          = CalendarUtils::createDatetimeFromFormat('Y/m/d', $Jalalian);
            $carbon            = Carbon::createFromTimestamp($dateTime->getTimestamp());
            $student->birthday = $carbon->toDateTimeString();
            //end birthday section

            $student->school        = $request->input('school');
            $student->telePhone     = $request->input('telePhone');
            $student->parentPhone   = $request->input('parentPhone');
            $student->mobile        = $request->input('student_mobile_edit');
            $student->cityId        = $request->input('city');
            $student->orientationId = $request->input('orientation');
            $student->gradeId       = $request->input('grade');

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
