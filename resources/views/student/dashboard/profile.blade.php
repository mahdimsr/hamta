@extends('layouts.student_dashboard')
@section('welcome')
<div class="logo" dir="rtl">
        <a  class="simple-text">
         {{$user->isComplete==0 ? 'دانش آموز گرامی خوش آمدی!' :$user->name.' '.$user->familyname.' خوش آمدی!' }}
        </a>
    </div>
@endsection
@section('updateinfo')
<li>
        <a href="{{ route('student_dashboard_profile')}}">
                <i class="pe-7s-user"></i>
            <p>{{$user->isComplete==0?'تکمیل اطلاعات' : 'ویرایش اطلاعات'}}</p>
        </a>
</li>
@endsection
@section('content')

	<div class="row" dir="rtl">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{$user->isComplete==0?'تکمیل اطلاعات' : 'ویرایش اطلاعات'}}</h4>
				</div>
				<div class="content">
					<form action="{{ route('student_dashboard_profile') }}" method="POST" class="needs-validation" novalidate>
                            {{ csrf_field() }}
						<div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label>تاریخ تولد </label>
                                                <input dir="rtl" name="birthday" type="date" class="form-control" value="{{ old('birthday')? old('birthday') : $user->birthday  }}" required>
                                                <small>{{ $errors->first('birthday') }}</small>
                                                <div class="invalid-feedback">

                                                    </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>نام خانوادگی</label>
                                        <input dir="rtl" type="text" name="familyname" class="form-control" placeholder="نام خانوادگی خود را وارد نمایید" value="{{ old('familyname')? old('familyname') : $user->familyname }}" required>
                                        <small>{{ $errors->first('familyname') }}</small>
                                        <div class="invalid-feedback">

                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>نام</label>
                                        <input dir="rtl" type="text" name="name" class="form-control" placeholder="نام خود را وارد نمایید" value="{{ old('name')? old('name') : $user->name }}" required >
                                        <small class="error">{{ $errors->first('name') }}</small>
                                        <div class="invalid-feedback">

                                            </div>
                                    </div>
                                </div>
                            </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>کد ملی</label>
									<input dir="rtl" type="text" name="nationalcode" class="form-control" placeholder="کد ملی خود را وارد نمایید" value="{{ old('nationalcode') ? old('nationalcode') : $user->nationalcode}}" required>
                                    <small>{{ $errors->first('nationalcode') }}</small>
                                    <div class="invalid-feedback">

                                        </div>
                                </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">پست الکترونیکی</label>
									<input dir="rtl" type="email" name="email" class="form-control" placeholder="پست الکترونیکی خود را وارد نمایید" value="{{ old('email')? old('email') : $user->email }}" required>
                                    <small>{{ $errors->first('email') }}</small>
                                    <div class="invalid-feedback">

                                        </div>
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>آدرس</label>
									<input dir="rtl" name="address" type="text" class="form-control" placeholder="آدرس خود را وارد نمایید" value="{{ old('address')? old('address') : $user->address }}" required>
                                    <small>{{ $errors->first('address') }}</small>
                                    <div class="invalid-feedback">

                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <label for="city">شهر</label>
                                    <select dir="rtl" name="city" class="form-control" id="city" required>
                                        <option selected disabled >شهر خود را انتخاب نمایید</option>
                                        @foreach ( $cities as $cityname )
                                        <option value="{{ $cityname->name }}" {{ old('city')==$cityname->name? 'selected' : '' }} {{ $user->city==$cityname->name? 'selected' : ''}}>{{ $cityname->name }}</option>
                                        @endforeach
                                    </select>
                                    <small>{{ $errors->first('city') }}</small>
                                    <div class="invalid-feedback">

                                        </div>
                                </div>
						</div>

						<div class="row">
                            <div class="col-md-1">
                                    <div class="form-group" style="margin-top:20px;" >
                                            <input dir="rtl" name="averageup" maxlength="2" type="number" class="form-control" value="{{ old('averageup')? old('averageup') : substr($user->average, 0, 2) }}" required>
                                            <small>{{ $errors->first('averageup') }}</small>
                                            <div class="invalid-feedback">

												</div>
                                        </div>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center" style="margin-top:30px;"> / </p>
                            </div>
                            <div class="col-md-1">
                                    <div class="form-group">
                                            <label> معدل دیپلم</label>
                                            <input dir="rtl" name="averagedown" maxlength="2" type="number" class="form-control" value="{{ old('averagedown')? old('averagedown') : substr($user->average, 3, 2) }}" required>
                                            <small>{{ $errors->first('averagedown') }}</small>
                                            <div class="invalid-feedback">

												</div>
                                        </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>مدرسه</label>
                                            <input dir="rtl" name="school" type="text" class="form-control" placeholder="نام مدرسه خود را وارد نمایید" value="{{ old('school')? old('school') : $user->school }}" required>
                                            <small>{{ $errors->first('school') }}</small>
                                            <div class="invalid-feedback">

												</div>
                                        </div>
                                    </div>
                            <div class="col-md-2">
                                    <label for="grade">مقطع</label>
                                    <select dir="rtl" name="grade" class="form-control" id="grade" required>
                                        <option selected disabled >مقطع تحصیلی خود را انتخاب نمایید</option>
                                        @foreach ( $grades as $gradetitle )
                                        <option value="{{ $gradetitle->title }}" {{ old('grade')==$gradetitle->title? 'selected' : '' }} {{ $user->grade==$gradetitle->title? 'selected' : ''}}>{{ $gradetitle->title }}</option>
                                        @endforeach
                                    </select>
                                    <small>{{ $errors->first('grade') }}</small>
                                    <div class="invalid-feedback">

                                        </div>
                                </div>
                            <div class="col-md-3">
                                    <label for="orientation">گرایش</label>
                                    <select dir="rtl" name="orientation" class="form-control" id="orientation" required>
                                        <option selected disabled >گرایش خود را انتخاب نمایید</option>
                                        @foreach ( $orientations as $orientationtitle )
                                        <option value="{{ $orientationtitle->title }}" {{ old('orientation')==$orientationtitle->title? 'selected' : '' }} {{ $user->orientation==$orientationtitle->title? 'selected' : ''}}>{{ $orientationtitle->title }}</option>
                                        @endforeach
                                    </select>
                                    <small>{{ $errors->first('orientation') }}</small>
                                    <div class="invalid-feedback">

                                        </div>
                                </div>
						</div>
						<div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>شماره تلفن همراه یکی از والدین</label>
                                            <input dir="rtl" name="parentphone" type="text" class="form-control" value="{{ old('parentphone')? old('parentphone') : $user->parentphone}}" required>
                                            <small>{{ $errors->first('parentphone') }}</small>
                                            <div class="invalid-feedback">

												</div>
                                        </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>شماره تلفن منزل بدون پیش شماره</label>
                                            <input dir="rtl" name="telephone" type="text" class="form-control" value="{{ old('telephone')? old('telephone') : substr($user->telephone,6) }}" required>
                                            <small>{{ $errors->first('telephone') }}</small>
                                            <div class="invalid-feedback">

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
