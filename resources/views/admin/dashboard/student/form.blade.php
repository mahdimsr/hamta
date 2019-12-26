@extends('layouts.admin_dashboard')
@section('content')
<div class="row" dir="rtl">
    <div class="col-md-3">
        <div class="card ">
            <div class="content">
                <div class="author text-right ">
                    <a href="#">
                        <img class="" src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px"
                             height="60px"/>
                        <h4 class="title">راهنما<br/>
                            <small>لطفا به نکات زیر توجه کنید</small>
                        </h4>
                        <hr>
                    </a>
                </div>
                <p class="description text-right">
                    لازم به ذکر است شماره تلفن منزل بدون پیش شماره سه رقمی استان وارد گردد.
                    <br><br>
                    ضمنا در بخش شماره تلفن همراه والدین فقط کافیست شماره تلفن یکی از آنها وارد گردد.
                    <br><br>
                    منظور از معدل ، معدل پایانی (نوبت دوم) آخرین مقطع تحصیلی گذرانده شده است.
                </p>
            </div>
            <hr>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card text-right">
            <div class="header ">
                <h4 class="title">ویرایش اطلاعات</h4>
            </div>
            <div class="content">
                <form action="{{ route('admin_students_edit',['id'=> $student->id])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>تاریخ تولد </label>
                                <input dir="rtl" id="birthday" name="birthday_admin" type="text"  placeholder="تاریخ تولد خود را وارد نمایید"
                                       class="form-control"
                                       value="{{ old('birthday_admin')? old('birthday_admin') : $student->birthday  }}"
                                       tabindex="3"
                                       >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('birthday_admin') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>نام خانوادگی</label>
                                <input dir="rtl" type="text" name="familyName_admin" class="form-control"
                                       placeholder="نام خانوادگی خود را وارد نمایید"
                                       value="{{ old('familyName_admin')? old('familyName_admin') : $student->familyName }}"
                                       tabindex="2"
                                      >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('familyName_admin') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>نام</label>
                                <input dir="rtl" type="text" name="name_admin" class="form-control"
                                       placeholder="نام خود را وارد نمایید"
                                       value="{{ old('name_admin') ? old('name_admin') : $student->name }}"
                                       tabindex="1"
                                       >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('name_admin') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>کد ملی</label>
                                <input dir="rtl" type="text" name="nationalCode_admin" class="form-control"
                                       placeholder="کد ملی خود را وارد نمایید" maxlength="10"
                                       value="{{ old('nationalCode_admin') ? old('nationalCode_admin') : $student->nationalCode}}"
                                       tabindex="5"
                                       >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('nationalCode_admin') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">پست الکترونیکی</label>
                                <input dir="rtl" id="email" type="text" name="email_admin" class="form-control email-radius"
                                       placeholder="پست الکترونیکی خود را وارد نمایید"
                                       value="{{ old('email_admin')? old('email_admin') : $student->email }}"
                                       tabindex="4"
                                       >
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('email_admin') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label>آدرس</label>
                                        <textarea dir="rtl" name="address_admin" rows="3" class="form-control textarea-radius" placeholder="آدرس خود را وارد نمایید" tabindex="8">{{ old('address_admin')? old('address_admin') : $student->address }}</textarea>
                                        <div class="invalid-feedback">
                                                <small>{{ $errors->first('address_admin') }}</small>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-md-3 " style="margin-top:2px;">
                            <label for="city">شهر</label>
                            <select dir="rtl" name="city" id="city" class="form-control menu" tabindex="7">
                                <option id="0" value="" disabled selected>شهر خود را انتخاب نمایید</option>
                                @foreach ( $cities as $city )
                                    <option id="{{ $city->provinceId }}" value="{{ $city->id }}" {{ old('city')==$city->id? 'selected' : '' }} {{ $student->isComplete==1 && $student->cityId==$city->id && !old('city')? 'selected' : '' }}> {{ $city->name }} </option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                <small>{{ $errors->first('city') }}</small>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top:2px;">
                            <label for="province">استان</label>
                            <select dir="rtl" name="province_admin" id="province" class="form-control menu" tabindex="6">
                                <option id="0" value="" selected disabled>استان خود را انتخاب نمایید</option>
                                @foreach ( $provinces as $province )
                                    <option  value="{{ $province->id}}" {{ old('province_admin') == $province->id ? 'selected' : '' }} {{ $student->isComplete==1 && $student->city->province->id==$province->id && !old('province_admin')? 'selected' : '' }}> {{ $province->name }} </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <small>{{ $errors->first('province_admin')}}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 averages" style="margin-bottom: 25px;">


                            <div class="form-group media-rights" >
                                <label>معدل</label>
                                <input dir="rtl" name="averageDown_admin" maxlength="2" type="number"
                                       class="form-control number-radius "
                                       value="{{ old('averageDown_admin')? old('averageDown_admin') : substr($student->average, 3, 2) }}"
                                       tabindex="13"
                                       >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('averageDown_admin') }}</small>
                                </div>

                            </div>

                            <p id="p1" class=" margins"> / </p>

                                <div class="form-group media-left">
                                <input dir="rtl" name="averageUp_admin" maxlength="2" type="number"
                                       class="form-control number-radius media-lefts"
                                       value="{{ old('averageUp_admin')? old('averageUp_admin') : substr($student->average, 0, 2) }}"
                                       tabindex="12"
                                      >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('averageUp_admin') }}</small>
                                </div>

                            </div>
                            <p id="p2" class=" margins"> / </p>



                    <!--		<div class="form-group media-rights"> -->

                        <!--	</div> -->


                        </div>
                        <div class="col-md-3">
                            <div class="form-group" >
                                <label>مدرسه</label>
                                <input dir="rtl" name="school_admin" type="text" class="form-control"
                                       placeholder="نام مدرسه خود را وارد نمایید"
                                       value="{{ old('school_admin')? old('school_admin') : $student->school }}"
                                       tabindex="11"
                                       >

                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('school_admin') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 ">
                            <label for="grade">مقطع</label>
                            <select dir="rtl" name="grade_admin" class="form-control dropdown-radius menu hide-search "  id="grade" tabindex="10"  >
                                <option value="" selected disabled>مقطع تحصیلی خود را انتخاب نمایید</option>
                                @foreach ( $grades as $grade )
                                    <option value="{{ $grade->id }}" {{ old('grade_admin')==$grade->id ? 'selected' : '' }} {{  $student->isComplete==1 && $student->gradeId==$grade->id && !old('grade_admin')? 'selected' : '' }}>{{ $grade->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                <small>{{ $errors->first('grade_admin') }}</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="orientation">گرایش</label>
                            <select dir="rtl" name="orientation_admin" class="form-control dropdown-radius menu hide-search"
                                    id="orientation" tabindex="9" >
                                <option value="" selected disabled>گرایش خود را انتخاب نمایید</option>
                                @foreach ( $orientations as $orientation )
                                    <option value="{{ $orientation->id }}" {{ old('orientation_admin')==$orientation->id? 'selected' : '' }} {{  $student->isComplete==1 && $student->orientationId==$orientation->id && !old('orientation_admin')? 'selected' : '' }} >{{ $orientation->title }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                <small>{{ $errors->first('orientation_admin') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>شماره تلفن همراه یکی از والدین</label>
                                        <input dir="rtl" name="parentPhone_admin" type="text" class="form-control "
                                               placeholder="شماره تلفن همراه یکی از والدین را وارد نمایید"
                                               value="{{ old('parentPhone_admin')? old('parentPhone_admin') : $student->parentPhone}}"
                                               tabindex="16"
                                               >
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('parentPhone_admin') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>شماره تلفن منزل بدون پیش شماره</label>
                                        <input dir="rtl" name="telePhone_admin" type="text" class="form-control"
                                               placeholder="شماره تلفن منزل را وارد نمایید" maxlength="8"
                                               value="{{ old('telePhone_admin')? old('telePhone_admin') : $student->telePhone }}"
                                               tabindex="15"
                                               >

                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('telePhone_admin') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>شماره تلفن همراه دانش آموز</label>
                                            <input dir="rtl" name="student_mobile_edit_admin" type="text" class="form-control"
                                                   placeholder="شماره تلفن همراه خود را وارد نمایید" maxlength="11"
                                                   value="{{ old('student_mobile_edit_admin')? old('student_mobile_edit_admin') : $student->mobile}}"
                                                   tabindex="14"
                                                   >
                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('student_mobile_edit_admin') }}</small>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تکرار رمز عبور</label>
                                    <input dir="rtl" name="newPassword_confirmation" type="password" class="form-control pass-radius "
                                           placeholder="تکرار رمز عبور را وارد نمایید"
                                           value="{{ old('newPassword_confirmation')? old('newPassword_confirmation') : '' }}"
                                           tabindex="16"
                                           >

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('newPassword_confirmation') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رمز عبور جدید</label>
                                    <input dir="rtl" name="newPassword" type="password" class="form-control pass-radius"
                                           placeholder="رمز عبور جدید را وارد نمایید"
                                           value="{{ old('newPassword')? old('newPassword') : ''}}"
                                           tabindex="17"
                                           >
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('newPassword') }}</small>
                                    </div>
                                </div>
                            </div>
                </div>
                    <a href="{{route('admin_students')}}" class="btn btn-info pull-right"> <span class="fas fa-arrow-right"></span>  بازگشت </a>
                    <button type="submit" class="btn btn-info btn-fill pull-left">ثبت تغییرات</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection

@section('script')
    <script>
    $(document).ready(function()
    {
        var id,options;
        var cities=$('#city option').clone();

        $("#birthday").pDatepicker({

            autoClose: true,
            initialValue: true,
            format: 'YYYY/MM/DD',
            responsive: true,
            toolbox: {
                calendarSwitch: {
                    enabled: false
                },
                submitButton:{enabled:true},
                todayButton:{
                    enabled:false
                }
            }
        });

    $("#province").change(function()
    {
        id = $("#province").val();
        options = cities.filter('[id=' + id + '],[id=0]');
        $('#city').html(options);
        $('#city').prop('selectedIndex',0).trigger('change');

    });

    if($("#province").val()!='')
    {

        id = $("#province").val();
        options = cities.filter('[id=' + id + '],[id=0]');
        $('#city').html(options);

    }

    });
    </script>
@endsection
