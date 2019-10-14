@extends('layouts.admin_dashboard')

@section('content')

    <div class="row" dir="rtl">

        <div class="col-md-4">
            <div class="card ">
                <div class="content">
                    <div class="author">
                        <a href="#">
                            <img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px"
                                 height="60px"/>

                            <h4 class="title">راهنما<br/>
                                <small>لطفا به نکات زیر توجه کنید</small>
                            </h4>
                            <hr/>
                        </a>
                    </div>
                    <p class="description text-right">
                    <p class="description text-right">
                        <b>کد </b>عبارتی حداکثر 8 حرفی است که دانش آموز برای استفاده از تخفیف یا شارژ مد نظر از این کد
                        استفاده میکند.
                    </p>
                    <p class="description text-right">
                            <b>تعداد دفعات استفاده </b> مشخص می کند که کد مورد نظر تا چند بار میتواند در خرید محصولات استفاده شود.
                        </p>
                    <p class="description text-right">
                        <b> درصد کد </b> درصد کد با توجه به نوع آن مشخص می کند که یک دانش آموز تا چند درصد می تواند روی آزمون ها تخفیف بگیرد یا تا چند درصد در شارژ کیف پول مبلغ بیشتری دریافت کند.
                    </p>
                    <p class="description text-right">
                        <b> تاریخ انقضا </b>تاریخی است که کد تخفیف تا آن تاریخ اعتبار دارد و از آن تاریخ به بعد کد قابل
                        استفاده نخواهد بود.
                    </p>
                </div>
                <hr>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card text-right">
                <div class="header ">
                    <h4 class="title">{{ $modify==0 ? 'افزودن کد' : 'ویرایش کد'}}</h4>
                </div>

                <div class="content">

                    <form method="post" action="{{$modify == 0 ? route('admin_discount_add') : route('admin_discount_edit',['id' => $discount->id])}}">
                        {{csrf_field()}}


                        <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تعداد دفعات استفاده</label>
                                            <input name="count" dir="rtl" type="text" class="form-control"
                                                 placeholder="تعداد دفعات استفاده کد را وارد نمایید" tabindex="2"
                                                value="{{old('count') ? old('count') : ''}}{{ $modify==1 && !old('count') ? $discount->count : '' }}">
                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('count') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>نوع کد</label>
                                                <select dir="rtl" name="type" class="form-control menu hide-search" {{$modify==1 ? 'disabled' : ''}}>
                                                    <option selected disabled>نوع کد را انتخاب نمایید</option>
                                                    <option value="GENERAL-CHARGE"
                                                        {{$modify == 1 ? $discount->type == 'GENERAL-CHARGE' ? 'selected' : '' : '' }}>
                                                        کد شگفت انگیز شارژ حساب کاربری
                                                    </option>
                                                    <option value="GENERAL-OFF"
                                                        {{$modify == 1 ? $discount->type == 'GENERAL-LESSONEXAM-OFF' ? 'selected' : '' : '' }}>
                                                     کد تخفیف آزمون های درس به درس
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <small>{{ $errors->first('type') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>کد</label>
                                                <input name="code" dir="rtl" type="text" class="form-control"
                                                       placeholder="کد تخفیف را وارد نمایید" tabindex="2"
                                                       value="{{old('code') ? old('code') : ''}}{{ $modify==1 && !old('code') ? $discount->code : '' }}">
                                                <div class="invalid-feedback">
                                                    <small>{{ $errors->first('code') }}</small>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاریخ انقضا</label>
                                    <input id="endDate" name="endDate" dir="rtl" type="text" class="form-control"
                                           tabindex="3"
                                           value="{{old('endDate') ? old('endDate') : '' }} {{ $modify == 1 && !old('endDate') ? $discount->endDate : ''}}">
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('endDate') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>درصد کد</label>
                                    <input name="value" dir="rtl" type="text" class="form-control"
                                           placeholder="مقدار تخفیف را وارد نمایید" tabindex="1"
                                           value="{{old('value') ? old('value') : ''}}{{ $modify==1 && !old('value') ? $discount->value : '' }}">
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('value') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-left" tabindex="4">اعمال</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script>

        $('#endDate').pDatepicker({

            autoClose    : true,
            initialValue : true,
            format       : 'YYYY/MM/DD',
            responsive   : true,
            toolbox      : {
                calendarSwitch : {
                    enabled : false
                },
                submitButton   : {enabled : true},
                todayButton    : {
                    enabled : false
                }
            }
        })

    </script>
@endsection
