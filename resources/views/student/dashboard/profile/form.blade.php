@extends('layouts.student_dashboard')
@section('content')
	<div class="row" dir="rtl">
		<div class="col-md-3">
			<div class="card ">
				<div class="content">
					<div class="author text-center ">
						<a href="#">
							<img class="" src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px"
								 height="60px"/>
							<h4 class="title">راهنما<br/>
								<small> فرم {{$student->isComplete==0?'تکمیل اطلاعات' : 'ویرایش اطلاعات'}}</small>
							</h4>
						</a>
					</div>


					
                    <p class="description text-right"><br>
                        @if($student->isComplete == 0)
                        در این قسمت اطلاعات خود را تکمیل نمایید تا بتوانید از امکانات بینظیر سایت بهره مند شوید ! دقت کنید که بعد از تکمیل اطلاعات برخی از فیلد ها قابل ویرایش نخواهند بود.
                        <br><br>
                        لازم به ذکر است شماره تلفن منزل بدون پیش شماره سه رقمی استان وارد گردد.
                        <br><br>
                        ضمنا در بخش شماره تلفن همراه والدین فقط کافیست شماره تلفن یکی از آنها وارد گردد.
                        <br><br>
                        منظور از معدل ، معدل پایانی (نوبت دوم) آخرین مقطع تحصیلی گذرانده شده است.
                        @else
                        لازم به ذکر است شماره تلفن منزل بدون پیش شماره سه رقمی استان وارد گردد.
                        <br><br>
                        ضمنا در بخش شماره تلفن همراه والدین فقط کافیست شماره تلفن یکی از آنها وارد گردد.
                        <br><br>
                        دقت شود که در صورت تغییر پست الکترونیکی یا شماره تلفن همراه، کد اعتبارسنجی برای شما ارسال میگردد.
                        @endif
					</p>
				</div>
				<hr>
				<div class="text-center">


				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{$student->isComplete==0?'تکمیل اطلاعات' : 'ویرایش اطلاعات'}}</h4>
				</div>
				<div class="content">
					<form action="{{ $student->isComplete==0? route('student_dashboard_profile_update') : route('student_dashboard_profile_edit') }}" method="POST" autocomplete="off">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>تاریخ تولد </label>
									<input dir="rtl" id="birthday" name="birthday" type="text"  placeholder="تاریخ تولد خود را وارد نمایید"
										   class="form-control"
                                           value="{{ old('birthday')? old('birthday') : $student->birthday  }}"
                                           tabindex="3"
                                           {{ $student->isComplete== 1? 'disabled' : '' }} >

									<div class="invalid-feedback">
										<small>{{ $errors->first('birthday') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>نام خانوادگی</label>
									<input dir="rtl" type="text" name="familyName" class="form-control"
                                           placeholder="نام خانوادگی خود را وارد نمایید"
                                           value="{{ old('familyName')? old('familyName') : $student->familyName }}"
                                           tabindex="2"
                                           {{ $student->isComplete== 1? 'disabled' : '' }}>

									<div class="invalid-feedback">
										<small>{{ $errors->first('familyName') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>نام</label>
									<input dir="rtl" type="text" name="name" class="form-control"
										   placeholder="نام خود را وارد نمایید"
                                           value="{{ old('name') ? old('name') : $student->name }}"
                                           tabindex="1"
                                           {{ $student->isComplete== 1? 'disabled' : '' }} >

									<div class="invalid-feedback">
										<small>{{ $errors->first('name') }}</small>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>کد ملی</label>
									<input dir="rtl" type="text" name="nationalCode" class="form-control"
										   placeholder="کد ملی خود را وارد نمایید"
                                           value="{{ old('nationalCode') ? old('nationalCode') : $student->nationalCode}}"
                                           tabindex="5" maxlength="10"
                                           {{ $student->isComplete== 1? 'disabled' : '' }}  >

									<div class="invalid-feedback">
										<small>{{ $errors->first('nationalCode') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">پست الکترونیکی</label>
									<input dir="rtl" id="email" type="text" name="email" class="form-control email-radius"
										   placeholder="پست الکترونیکی خود را وارد نمایید"
                                           value="{{ old('email')? old('email') : $student->email }}"
                                           tabindex="4"
                                           >
									<div class="invalid-feedback">
										<small>{{ $errors->first('email') }}</small>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
                                    <div class="form-group">
                                            <label>آدرس</label>
                                            <textarea dir="rtl" maxlength="200" name="address" rows="3" class="form-control textarea-radius" placeholder="آدرس خود را وارد نمایید" tabindex="8">{{ old('address')? old('address') : $student->address }}</textarea>
                                            <div class="invalid-feedback">
                                                    <small>{{ $errors->first('address') }}</small>
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
								<select dir="rtl" name="province" id="province" class="form-control menu" tabindex="6">
									<option id="0" value="" selected disabled>استان خود را انتخاب نمایید</option>
									@foreach ( $provinces as $province )
										<option  value="{{ $province->id}}" {{ old('province') == $province->id ? 'selected' : '' }} {{ $student->isComplete==1 && $student->city->province->id==$province->id && !old('province')? 'selected' : '' }}> {{ $province->name }} </option>
									@endforeach
								</select>
								<div class="invalid-feedback">
									<small>{{ $errors->first('province')}}</small>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 averages" style="margin-bottom: 25px;">


								<div class="form-group media-rights" >
									<label>معدل</label>
									<input dir="rtl" name="averageDown" maxlength="2" type="number"
										   class="form-control number-radius "
										   value="{{ old('averageDown')? old('averageDown') : substr($student->average, 3, 2) }}"
										   tabindex="13"
                                           {{ $student->isComplete== 1? 'disabled' : '' }}  >

									<div class="invalid-feedback">
										<small>{{ $errors->first('averageDown') }}</small>
									</div>

								</div>

								<p id="p1" class=" margins"> / </p>

									<div class="form-group media-left">
									<input dir="rtl" name="averageUp" maxlength="2" type="number"
										   class="form-control number-radius media-lefts"
                                           value="{{ old('averageUp')? old('averageUp') : substr($student->average, 0, 2) }}"
                                           tabindex="12"
                                           {{ $student->isComplete== 1? 'disabled' : '' }} >

									<div class="invalid-feedback">
										<small>{{ $errors->first('averageUp') }}</small>
									</div>

								</div>
								<p id="p2" class=" margins"> / </p>



						<!--		<div class="form-group media-rights"> -->

							<!--	</div> -->


							</div>
							<div class="col-md-3">
								<div class="form-group" >
									<label>مدرسه</label>
									<input dir="rtl" name="school" type="text" class="form-control"
										   placeholder="نام مدرسه خود را وارد نمایید"
                                           value="{{ old('school')? old('school') : $student->school }}"
                                           tabindex="11"
                                           {{ $student->isComplete== 1? 'disabled' : '' }}  >

									<div class="invalid-feedback">
										<small>{{ $errors->first('school') }}</small>
									</div>
								</div>
							</div>

							<div class="col-md-3 ">
								<label for="grade">مقطع تحصیلی</label>
								<select dir="rtl" name="grade" class="form-control dropdown-radius menu hide-search "  id="grade" tabindex="10"  {{ $student->isComplete== 1? 'disabled' : '' }} >
									<option value="" selected disabled>مقطع تحصیلی خود را انتخاب نمایید</option>
									@foreach ( $grades as $grade )
										<option value="{{ $grade->id }}" {{ old('grade')==$grade->id ? 'selected' : '' }} {{  $student->isComplete==1 && $student->gradeId==$grade->id && !old('grade')? 'selected' : '' }}>{{ $grade->title }}</option>
									@endforeach
								</select>

								<div class="invalid-feedback">
									<small>{{ $errors->first('grade') }}</small>
								</div>
							</div>
							<div class="col-md-3">
								<label for="orientation">گرایش تحصیلی</label>
								<select dir="rtl" name="orientation" class="form-control dropdown-radius menu hide-search"
										id="orientation" tabindex="9"  {{ $student->isComplete== 1? 'disabled' : '' }} >
									<option value="" selected disabled>گرایش تحصیلی خود را انتخاب نمایید</option>
									@foreach ( $orientations as $orientation )
										<option value="{{ $orientation->id }}" {{ old('orientation')==$orientation->id? 'selected' : '' }} {{  $student->isComplete==1 && $student->orientationId==$orientation->id && !old('orientation')? 'selected' : '' }} >{{ $orientation->title }}</option>
									@endforeach
								</select>

								<div class="invalid-feedback">
									<small>{{ $errors->first('orientation') }}</small>
								</div>
							</div>
                        </div>
						<div class="row">
                            @if($student->isComplete == 0)
							<div class="col-md-6">
								<div class="form-group">
									<label>شماره تلفن همراه یکی از والدین</label>
									<input dir="rtl" name="parentPhone" type="text" class="form-control"
										   placeholder="شماره تلفن همراه یکی از والدین را وارد نمایید" maxlength="11"
                                           value="{{ old('parentPhone')? old('parentPhone') : $student->parentPhone}}"
                                           tabindex="15"
                                           >

									<div class="invalid-feedback">
										<small>{{ $errors->first('parentPhone') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>شماره تلفن منزل بدون پیش شماره</label>
									<input dir="rtl" name="telePhone" type="text" class="form-control" maxlength="8"
										   placeholder="شماره تلفن منزل را وارد نمایید"
                                           value="{{ old('telePhone')? old('telePhone') : $student->telePhone }}"
                                           tabindex="14"
                                           >

									<div class="invalid-feedback">
										<small>{{ $errors->first('telePhone') }}</small>
									</div>
								</div>
                            </div>
                                @else
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>شماره تلفن همراه یکی از والدین</label>
                                            <input dir="rtl" name="parentPhone" type="text" class="form-control"
                                                   placeholder="شماره تلفن همراه یکی از والدین را وارد نمایید" maxlength="11"
                                                   value="{{ old('parentPhone')? old('parentPhone') : $student->parentPhone}}"
                                                   tabindex="16"
                                                   >
                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('parentPhone') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>شماره تلفن منزل بدون پیش شماره</label>
                                            <input dir="rtl" name="telePhone" type="text" class="form-control"
                                                   placeholder="شماره تلفن منزل را وارد نمایید" maxlength="8"
                                                   value="{{ old('telePhone')? old('telePhone') : $student->telePhone }}"
                                                   tabindex="15"
                                                   >

                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('telePhone') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>شماره تلفن همراه دانش آموز</label>
                                                <input dir="rtl" name="student_mobile_edit" type="text" class="form-control"
                                                       placeholder="شماره تلفن همراه خود را وارد نمایید" maxlength="11"
                                                       value="{{ old('student_mobile_edit')? old('student_mobile_edit') : $student->mobile}}"
                                                       tabindex="14"
                                                       >
                                                <div class="invalid-feedback">
                                                    <small>{{ $errors->first('student_mobile_edit') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                @endif
						</div>
						<button type="submit" class="btn btn-info btn-fill pull-right">ثبت تغییرات</button>
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