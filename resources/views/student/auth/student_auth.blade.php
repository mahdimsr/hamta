<!DOCTYPE html>
<html lang="per" >
<head>
  <meta charset="UTF-8">
  <title>سامانه همتا | دانش آموزان</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/xb-roya" type="text/css"/>

  
  
      <link rel="stylesheet" href="{{asset('css/student/auth/style.css')}}">

  
</head>

<body>

  <div class="container">
    <div class="backbox">
      <div class="loginMsg">
        <div class="textcontent">
          <p class="title">هنوز حساب کاربری نداری ؟</p>
          <p>تو چند ثانیه درستش کن و راحت تو سایت بگرد</p>
          <button id="switch1">ثبت نام</button>
        </div>
      </div>
      <div class="signupMsg visibility">
        <div class="textcontent">
          <p class="title">از قبل حساب کاربری داری؟</p>
          <p>خیلی خوبه. اطلاعات رو بنویس و وارد شو</p>
          <button id="switch2">ورود</button>
        </div>
      </div>
    </div>
    <!-- backbox -->

    <div class="frontbox" dir="rtl">
      <div class="login">
        <h2>ورود</h2>
        <div class="inputbox">
		  <form action="{{route('student_login_submit')}}" method='post'>
				{{csrf_field()}}
		  <input type="text" name="mobile-email" placeholder="شماره تلفن همراه یا پست الکترونیکی خود را وارد کنید" value="{{old('mobile-email')}}">
		  <small>{{$errors->first('mobile-email')}}</small>
      <input type="password" name="password" placeholder="کلمه عبور خود را وارد کنید">
			<small>{{$errors->first('password')}}</small>
		  <button type="submit">وارد شو</button>
		</form>
        </div>
        <p>فراموشی رمز عبور؟</p>
      </div>
      <div class="signup hide">
        <h2>ثبت نام</h2>
        <div class="inputbox">
				<form action="{{route('student_register')}}" method='post'>
						{{csrf_field()}}
          <input type="text" name="mobile" placeholder="شماره تلفن همراه خود را وارد کنید" value="{{old('mobile')}}">
		  <small>{{$errors->first('mobile')}}</small>
      <input type="password" name="password_signup" placeholder="کلمه عبور خود را وارد کنید">
      <small>{{$errors->first('password_signup')}}</small>
      <input type="password" name="password_confirmation" placeholder="تکرار کلمه عبور را وارد کنید">
		  <button type="submit">ثبت نام</button>
				</form>
        </div>
      </div>

      
    </div>
    <!-- frontbox -->
  </div>
</body>

</html>
  
  

    <script src="{{asset('js/student/auth/index.js')}}"></script>
</body>

</html>
