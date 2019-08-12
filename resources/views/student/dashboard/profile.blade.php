@extends('student.dashboard.layout')

@section('content')

	<div class="row" dir="rtl">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">تکمیل اطلاعات</h4>
				</div>
				<div class="content">
					<form action="{{ route('student_dashboard_profile') }}" method="POST">
                            {{ csrf_field() }}
						<div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label>تاریخ تولد </label>
                                                <input dir="rtl" name="birthday" type="date" class="form-control" value="{{ old('birthday')? old('birthday') : $birthday  }}">
                                                <small>{{ $errors->first('birthday') }}</small>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>نام خانوادگی</label>
                                        <input dir="rtl" type="text" name="familyname" class="form-control" placeholder="نام خانوادگی خود را وارد نمایید" value="{{ old('familyname')? old('familyname') : $familyname }}" >
                                        <small>{{ $errors->first('familyname') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>نام</label>
                                        <input dir="rtl" type="text" name="name" class="form-control" placeholder="نام خود را وارد نمایید" value="{{ old('name')? old('name') : $name }}" >
                                        <small>{{ $errors->first('name') }}</small>
                                    </div>
                                </div>
                            </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>کد ملی</label>
									<input dir="rtl" type="text" name="nationalcode" class="form-control" placeholder="کد ملی خود را وارد نمایید" value="{{ old('nationalcode') ? old('nationalcode') : $nationalcode}}">
                                    <small>{{ $errors->first('nationalcode') }}</small>
                                </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">پست الکترونیکی</label>
									<input dir="rtl" type="email" name="email" class="form-control" placeholder="پست الکترونیکی خود را وارد نمایید" value="{{ old('email')? old('email') : $email }}">
                                    <small>{{ $errors->first('email') }}</small>
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>آدرس</label>
									<input dir="rtl" name="address" type="text" class="form-control" placeholder="آدرس خود را وارد نمایید" value="{{ old('address')? old('address') : $address }}">
                                    <small>{{ $errors->first('address') }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <label for="city">شهر</label>
                                    <select dir="rtl" name="city" class="form-control" id="city">
                                        <option selected disabled >شهر خود را انتخاب نمایید</option>
                                        @foreach ( $citys as $city1 )
                                        <option value="{{ $city1->cityname }}" {{ old('city')==$city1->cityname? 'selected' : '' }} {{ $city==$city1->cityname? 'selected' : ''}}>{{ $city1->cityname }}</option>
                                        @endforeach
                                    </select>
                                    <small>{{ $errors->first('city') }}</small>
                                </div>
						</div>

						<div class="row">
                            <div class="col-md-1">
                                    <div class="form-group" style="margin-top:20px;" >
                                            <input dir="rtl" name="average1" maxlength="2" type="number" class="form-control" value="{{ old('average1')? old('average1') : $average1 }}">
                                            <small>{{ $errors->first('average1') }}</small>
                                        </div>
                            </div>
                            <div class="col-md-1">
                                <p class="text-center" style="margin-top:30px;"> / </p>
                            </div>
                            <div class="col-md-1">
                                    <div class="form-group">
                                            <label> معدل دیپلم</label>
                                            <input dir="rtl" name="average2" maxlength="2" type="number" class="form-control" value="{{ old('average2')? old('average2') : $average2 }}">
                                            <small>{{ $errors->first('average2') }}</small>
                                        </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>مدرسه</label>
                                            <input dir="rtl" name="school" type="text" class="form-control" placeholder="نام مدرسه خود را وارد نمایید" value="{{ old('school')? old('school') : $school }}">
                                            <small>{{ $errors->first('school') }}</small>
                                        </div>
                                    </div>
                            <div class="col-md-2">
                                    <label for="grade">مقطع</label>
                                    <select dir="rtl" name="grade" class="form-control" id="grade">
                                        <option selected disabled >مقطع تحصیلی خود را انتخاب نمایید</option>
                                        <option value="دوازدهم" {{ old('grade')=='نهم'? 'selected' : '' }} {{ $grade=='دوازدهم'? 'selected' : '' }}>دوازدهم</option>
                                    </select>
                                    <small>{{ $errors->first('grade') }}</small>
                                </div>
                            <div class="col-md-3">
                                    <label for="orientation">گرایش</label>
                                    <select dir="rtl" name="orientation" class="form-control" id="orientation">
                                        <option selected disabled >گرایش خود را انتخاب نمایید</option>
                                        <option value="ریاضی" {{ old('orientation')=='ریاضی'? 'selected' : '' }} {{ $orientation=='ریاضی'? 'selected' : '' }} >ریاضی</option>
                                        <option value="تجربی" {{ old('orientation')=='تجربی'? 'selected' : '' }} {{ $orientation=='تجربی'? 'selected' : '' }} >تجربی</option>
                                        <option value="هنر" {{ old('orientation')=='هنر'? 'selected' : '' }} {{ $orientation=='هنر'? 'selected' : '' }} >هنر</option>
                                    </select>
                                    <small>{{ $errors->first('orientation') }}</small>
                                </div>
						</div>
						<div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>شماره تلفن همراه یکی از والدین</label>
                                            <input dir="rtl" name="parentphone" type="text" class="form-control" value="{{ old('parentphone')? old('parentphone') : $parentphone}}">
                                            <small>{{ $errors->first('parentphone') }}</small>
                                        </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label>شماره تلفن منزل به همراه پیش شماره </label>
                                            <input dir="rtl" name="telephone" type="text" class="form-control" value="{{ old('telephone')? old('telephone') : $telephone }}">
                                            <small>{{ $errors->first('telephone') }}</small>
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
