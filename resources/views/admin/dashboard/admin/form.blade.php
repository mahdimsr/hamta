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
						<b>نام کامل</b>اسم کامل ادمین است. برای مثال نریمان خرم نیا
					</p>
					<p class="description text-right">
						<b>نام کاربری ادمین</b> برای ورود به بخش ادمین های سامانه استفاده میشود. دقت کنید که نام کاربری
						ادمین ها نمیتواند تکراری باشد. برای مثال نمیتوان نام کاربری test را به دونفر اختصاص داد. در
						تعریف نام کاربری از دکمه space استفاده نکیند و بین عبارات فاصله نیندازید.
					</p>
					<p class="description text-right">
						<b>رمز عبور</b> باید 9 کارکتر باشد و میتواند ترکیبی از حرف و عدد هم باشد. در رمز عبور از دکمه
						space استفاده نکیند و بین کارکترها فاصله نیندازید.
					</p>
					<p class="description text-right">
						<b>تکرار رمز عبور</b> باید دقیقا مثل رمز عبور باشد.
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{$modify==0? 'افزودن ادمین جدید' : 'ویرایش مشخصات ادمین'}}</h4>
				</div>

				<div class="content">
					<form method="post"
						  action="{{  $modify == 0 ? route('admin_admins_add') : route('admin_admins_edit', ['id' => $admin->id]) }}">

						{{csrf_field()}}
						<div class="row">
								<div class="col-md-4">
										<div class="form-group">
											<label>سطح دسترسی</label>
											<select dir="rtl" name="level" class="form-control" tabindex="3">
												<option value="" selected disabled>سطح دسترسی را انتخاب نمایید</option>
												<option value="A" {{old('level')=='A' ? 'selected' : '' }} {{$modify==1 && !old('level') && $admin->level=="A" ?'selected' : ''}}>سوپر ادمین</option>
												<option value="B" {{old('level')=='B' ? 'selected' : '' }} {{$modify==1 && !old('level') && $admin->level=="B" ? 'selected' : ''}}>ادمین</option>
												<option value="C" {{old('level')=='C' ? 'selected' : '' }} {{$modify==1 && !old('level') && $admin->level=="C" ? 'selected' : ''}}>کارشناس</option>
												<option value="D" {{old('level')=='D' ? 'selected' : '' }} {{$modify==1 && !old('level') && $admin->level=="D" ? 'selected' : ''}}>کاربر معمولی</option>
											</select>
											<div class="invalid-feedback">
												<small>{{ $errors->first('level') }}</small>
											</div>
										</div>
									</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>نام کاربری</label>
									<input name="username" dir="rtl" type="text" class="form-control"
										   placeholder="نام کاربری ادمین را وارد کنید" tabindex="2"
										   value="{{old('username') ? old('username') : ''}} {{ $modify==1 && !old('username') ? $admin->username: '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('username') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>نام و نام خانوادگی</label>
									<input name="fullName" dir="rtl" type="text" class="form-control"
										   placeholder="نام و نام خانوادگی ادمین را وارد نمایید" tabindex="1"
										   value="{{old('fullName') ? old('fullName') : ''}} {{ $modify==1 && !old('fullName') ? $admin->fullName : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('fullName') }}</small>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>تکرار رمز عبور</label>
									<input name="password_confirmation" dir="rtl" type="text" class="form-control" tabindex="4">
									<div class="invalid-feedback">
										<small>{{ $errors->first('password_confirmation') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>رمز عبور</label>
									<input name="password" dir="rtl" type="text" class="form-control" tabindex="3">
									<div class="invalid-feedback">
										<small>{{ $errors->first('password') }}</small>
									</div>
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-left">اعمال</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>

	</div>

@endsection
