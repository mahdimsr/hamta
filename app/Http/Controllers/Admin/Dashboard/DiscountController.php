<?php

    namespace App\Http\Controllers\Admin\Dashboard;


    use App\Lib\Lib;
    use App\model\Discount;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Validation\Rule;
    use Morilog\Jalali\CalendarUtils;


    class DiscountController extends Controller
    {

        public function show()
        {

            $discounts = Discount::all();


            return view('admin.dashboard.discount.discounts', compact('discounts'));
        }


        public function addShow()
        {

            $modify = 0;

            return view('admin.dashboard.discount.form', compact('modify'));
        }


        public function add(Request $request)
        {

            $this->validate($request, ['code'    => 'required|string|max:15|unique:discount,code',
                                       'value'   => 'required|integer|min:0',
                                       'endDate' => 'required']);

            $discount = new Discount();

            $discount->code  = $request->input('code');
            $discount->value = $request->input('value');
            $discount->type  = $request->input('type');

            //convert endDate
            $persianDate       = Lib::convertFaToEn($request->input('endDate'));
            $date              = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon            = Carbon::createFromTimestamp($date->getTimestamp());
            $discount->endDate = $carbon->toDateTimeString();

            $discount->save();

            return redirect()->route('admin_codes_show');
        }


        public function editShow($id)
        {

            $modify = 1;

            $discount = Discount::query()->find($id);

            return view('admin.dashboard.discount.form', compact('modify', 'discount'));
        }


        public function edit(Request $request)
        {

            $this->validate($request, ['code'    => ['required', 'string', 'max:15'],
                                       Rule::unique('discount', 'code'),
                                       'value'   => 'required|integer|min:0',
                                       'endDate' => 'required']);

            $discount = Discount::query()->find($request->input('id'));

            $discount->code  = $request->input('code');
            $discount->value = $request->input('value');

            //convert endDate
            $persianDate       = Lib::convertFaToEn($request->input('endDate'));
            $date              = CalendarUtils::createDatetimeFromFormat('Y/m/d', $persianDate);
            $carbon            = Carbon::createFromTimestamp($date->getTimestamp());
            $discount->endDate = $carbon->toDateTimeString();

            $discount->update();

            return redirect()->route('admin_codes_show');
        }


        public function remove($id)
        {
            $discount = Discount::query()->find($id);

            $discount->delete();

            return redirect()->back();
        }

    }
