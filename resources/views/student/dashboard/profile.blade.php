@extends('layouts.student_dashboard')
@section('content')

	<div class="row" dir="rtl">
        <div class="col-md-4">
            <div class="card ">

                <div class="content">
                    <div class="author" >
                        <a href="#">
                            <img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px" height="60px"/>

                            <h4 class="title">راهنما<br />
                                <small> فرم تکمیل اطلاعات</small>
                            </h4>
                        </a>
                    </div>
                    <p class="description text-center"> بخش اول<br>
                        بازی PC Building Simulator محصولی از Claudiu Kiss و
                        The Irregular Corporation است که در سبک شبیه‌سازی طراحی و ساخته شده
                            و در ۲۷ مارس ۲۰۱۸ عرضه شده است.
                    </p>
                    <p class="description text-center"> بخش دوم<br>
                        بازی PC Building Simulator محصولی از Claudiu Kiss و
                        The Irregular Corporation است که در سبک شبیه‌سازی طراحی و ساخته شده
                        و در ۲۷ مارس ۲۰۱۸ عرضه شده است.
                    </p>
                </div>
                <hr>
                <div class="text-center">


                </div>
            </div>
        </div>
		<div class="col-md-8">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{$student->isComplete==0?'تکمیل اطلاعات' : 'ویرایش اطلاعات'}}</h4>
				</div>
				<div class="content">
					<form action="{{ route('student_dashboard_profile') }}" method="POST" >
                            {{ csrf_field() }}
						<div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label>تاریخ تولد </label>
                                                <input dir="rtl" name="birthday" type="text" class="form-control initial-value-example" value="{{ old('birthday')? old('birthday') : $student->birthday  }}">

                                                <div class="invalid-feedback">
                                                    <small>{{ $errors->first('birthday') }}</small>
                                                    </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>نام خانوادگی</label>
                                        <input dir="rtl" type="text" name="familyName" class="form-control" placeholder="نام خانوادگی خود را وارد نمایید" value="{{ old('familyName')? old('familyName') : $student->familyName }}">

                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('familyName') }}</small>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>نام</label>
                                        <input dir="rtl" type="text" name="name"  class="form-control"  value="{{ old('name')? old('name') : $student->name }}" >

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
									<input dir="rtl" type="text" name="nationalCode" class="form-control" placeholder="کد ملی خود را وارد نمایید" value="{{ old('nationalCode') ? old('nationalCode') : $student->nationalCode}}">

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('nationalCode') }}</small>
                                        </div>
                                </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">پست الکترونیکی</label>
									<input dir="rtl" type="email" name="email" class="form-control email-radius" placeholder="پست الکترونیکی خود را وارد نمایید" value="{{ old('email')? old('email') : $student->email }}">

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('email') }}</small>
                                        </div>
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>آدرس</label>
									<input dir="rtl" name="address" type="text" class="form-control" placeholder="آدرس خود را وارد نمایید" value="{{ old('address')? old('address') : $student->address }}">

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('address') }}</small>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <label for="city">شهر</label>
                                    <select dir="rtl" name="city" class="form-control city"  >
                                        <option selected disabled >شهر خود را انتخاب نمایید</option>
                                        @foreach ( $cities as $city )
                                        <option value="{{ $city->name }}" {{ old('city')==$city->name? 'selected' : '' }} {{ $student->isComplete==1 && $student->city()->first()->name==$city->name && !old('city')? 'selected' : '' }}> {{ $city->name }} </option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('city') }}</small>
                                        </div>
                                </div>
						</div>

						<div class="row">
                            <div class="col-md-1">
                                    <div class="form-group" style="margin-top:20px;" >
                                            <input dir="rtl" name="averageUp" maxlength="2" type="number" class="form-control number-radius" value="{{ old('averageUp')? old('averageUp') : substr($student->average, 0, 2) }}">

                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('averageUp') }}</small>
												</div>
                                        </div>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center" style="margin-top:30px;"> / </p>
                            </div>
                            <div class="col-md-1">
                                    <div class="form-group">
                                            <label> معدل دیپلم</label>
                                            <input dir="rtl" name="averageDown" maxlength="2" type="number" class="form-control number-radius" value="{{ old('averageDown')? old('averageDown') : substr($student->average, 3, 2) }}">

                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('averageDown') }}</small>
												</div>
                                        </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>مدرسه</label>
                                    <input dir="rtl" name="school" type="text" class="form-control" placeholder="نام مدرسه خود را وارد نمایید" value="{{ old('school')? old('school') : $student->school }}" >

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('school') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 ">
                                    <label for="grade">مقطع</label>
                                    <select dir="rtl" name="grade" class="form-control dropdown-radius"  id="grade">
                                        <option selected disabled >مقطع تحصیلی خود را انتخاب نمایید</option>
                                        @foreach ( $grades as $grade )
                                        <option value="{{ $grade->title }}" {{ old('grade')==$grade->title ? 'selected' : '' }} {{  $student->isComplete==1 && $student->grade()->first()->title==$grade->title && !old('grade')? 'selected' : '' }}>{{ $grade->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('grade') }}</small>
                                        </div>
                                </div>
                            <div class="col-md-3">
                                    <label for="orientation">گرایش</label>
                                    <select dir="rtl" name="orientation" class="form-control dropdown-radius"  id="orientation">
                                        <option selected disabled >گرایش خود را انتخاب نمایید</option>
                                        @foreach ( $orientations as $orientation )
                                        <option value="{{ $orientation->title }}" {{ old('orientation')==$orientation->title? 'selected' : '' }} {{  $student->isComplete==1 && $student->orientation()->first()->title==$orientation->title && !old('orientation')? 'selected' : '' }} >{{ $orientation->title }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('orientation') }}</small>
                                        </div>
                                </div>
						</div>
						<div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>شماره تلفن همراه یکی از والدین</label>
                                            <input dir="rtl" name="parentPhone" type="text" class="form-control" value="{{ old('parentPhone')? old('parentPhone') : $student->parentPhone}}">

                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('parentPhone') }}</small>
												</div>
                                        </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>شماره تلفن منزل بدون پیش شماره</label>
                                            <input dir="rtl" name="telePhone" type="text" class="form-control" value="{{ old('telePhone')? old('telePhone') : substr($student->telePhone,6) }}">

                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('telePhone') }}</small>
												</div>
                                        </div>
							</div>
						</div>
						<button type="submit" class="btn btn-info btn-fill pull-right">ثبت تغییرات</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection
