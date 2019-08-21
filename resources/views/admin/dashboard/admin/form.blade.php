@extends('layouts.admin_dashboard')

@section('content')

	<div class="row" dir="rtl">

		<div class="col-md-5">
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
		<div class="col-md-7">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">ادمین</h4>
				</div>

				<div class="content">
					<form method="post"
						  action="{{  $modify == 0 ? route('admin_admins_add') : route('admin_admins_edit', ['username' => $admin->username]) }}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>نام کاربری ادمین</label>
									<input name="username" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: ali-username"
										   value="{{old('username') ? old('username') : ''}} {{ $modify==1 && !old('username') ? $admin->username: '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('username') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>نام کامل ادمین</label>
									<input name="fullName" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: علی ربیعی"
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
									<input name="repeatPassword" dir="rtl" type="text" class="form-control">
									<div class="invalid-feedback">
										<small>{{ $errors->first('repeatPassword') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>رمز عبور</label>
									<input name="password" dir="rtl" type="text" class="form-control">
									<div class="invalid-feedback">
										<small>{{ $errors->first('password') }}</small>
									</div>
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-left">افزودن</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>

	</div>

@endsection
