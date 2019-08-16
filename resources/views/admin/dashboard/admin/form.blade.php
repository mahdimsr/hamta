@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">ادمین</h4>
				</div>


				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="content">
					<form method="post" action="{{  $modify == 0 ? route('admin_admins_add') : route('admin_admins_edit', ['username' => $admin->username]) }}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>نام کاربری ادمین</label>
									<input name="username" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: ali-username" value="{{old('username') ? old('username') : ''}} {{ $modify==1 && !old('username') ? $admin->username: '' }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>نام کامل ادمین</label>
									<input name="fullName" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: علی ربیعی" value="{{old('fullName') ? old('fullName') : ''}} {{ $modify==1 && !old('fullName') ? $admin->fullName : '' }}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>تکرار رمز عبور</label>
									<input name="repeatPassword" dir="rtl" type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>رمز عبور</label>
									<input name="password" dir="rtl" type="text" class="form-control">
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-right">افزودن</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection
