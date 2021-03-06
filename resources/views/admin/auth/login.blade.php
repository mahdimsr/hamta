<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>همپا | ادمین</title>
	<link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
	<link rel='stylesheet' type='text/css' media='screen' href="{{asset('css/admin/auth/style.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
		  integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>
<body>
<form method="post" action="{{ route('admin_login_submit')}}">


	{{csrf_field()}}


	<div class="loginbox">
		<img src="{{asset('image/logo/logo.png')}}" class="user">

		<div class="inputbox">
			<input type="text" name="username" placeholder="نام کاربری"
				   value="{{ $adminInfo ? $adminInfo : old('username')}}">
			<span><i class="fas fa-users" aria-hidden="true"></i></span>
			<small class="err">{{  $errors->first('username')}}</small>

		</div>

		<div class="inputbox">
			<input type="password" name="password" placeholder="رمز عبور"
				   value="{{ $adminPass ? $adminPass : old('password') }}">
			<span><i class="fas fa-lock"></i></span>
			<small class="err">{{$errors->first('password')}}</small>
		</div>


		<div class="con">
			<label>مرا به خاطر داشته باش
				<input type="checkbox" name="remember" {{ $adminInfo ? 'checked' : ''  }}>
				<span class="checkmark"></span>
			</label>
		</div>

		<input type="submit" value="ورود">
		
		@if($errors->any())
			<div class="has-error err">{{$errors->first('message')}}</div>
		@endif
	</div>
</form>
<script  src="{{asset('js/admin/dashboard/jquery.3.2.1.min.js')}}"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
</body>
</html>
