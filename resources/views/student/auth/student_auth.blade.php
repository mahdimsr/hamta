<!DOCTYPE html>
<html lang="per" >
<head>
  <title> همتا | دانش آموزان</title>
  <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">

</head><link rel="stylesheet" href="{{ asset('css/student/auth/style.css') }}">

</head>
<body>




<header>
<a href="{{ route('student_auth') }}" class="logo">دانش آموزان</a>
<div class="menu-toggle"></div>
<nav>
<ul>
<li><a href="{{ route('homepage') }}" class="active">صفحه اصلی</a></li>
<li><a href="#">اساتید</a></li>
</ul>
</nav>
<div class="clearfix"></div>
 </header>

<svg id="stroke" width="0" height="0">
	<defs>
		<path id="line" d="M2 2c49.7 2.6 100 3.1 150 1.7-46.5 2-93 4.4-139.2 7.3 45.2-1.5 90.6-1.8 135.8-.6" fill="none" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke"/>

	</defs>
</svg>

<section class="forms-section">
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher btn">
        ورود



        <svg class="button-stroke" viewBox="0 0 154 13">
			<use href="#line"></use>
		</svg>
		<svg class="button-stroke" viewBox="0 0 154 13">
			<use href="#line"></use>
		</svg>






      </button>
      <form class="form form-login" action="{{route('student_login')}}" method='post'>
          {{ csrf_field() }}
        <fieldset>

          <div class="input-block">
            <input type="text" id="mobile_email" class="basic-slide" name="mobile_email" placeholder="شماره همراه یا ایمیل"  value="{{ $studentInfo ? $studentInfo : old('mobile_email')}}" required>
            <label for="mobile_email">نام کاربری</label>
            <small>{{$errors->first('mobile_email')}}</small>
          </div>



          <div class="input-block">

            <input type="password" id="password" name="password"  class="basic-slide" placeholder="رمز عبور" value="{{ $studentPass? $studentPass : old('password') }}" required>
            <label for="password" class="a">رمز عبور</label>
			<small>{{$errors->first('password')}}</small>
          </div>


          <div class="con">
              <label>مرا به خاطر داشته باش
                  <input type="checkbox" name="remember" {{ $studentInfo ? 'checked' : ''  }} >
                  <span class="checkmark"></span>
                </label>
                </div>
          <a href="#">رمز خود را فراموش کردید؟

          </a>
          <ul>
          <li class="error" >{{$errors->first('message')}}</li>
          </ul>


        </fieldset>
































        <button type="submit" class="loginbtn ">

        <span>


        ورود
</span>

      </button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher btn">
        ثبت نام


  			<svg class="button-stroke" viewBox="0 0 154 13">
			<use href="#line"></use>
		</svg>
		<svg class="button-stroke" viewBox="0 0 154 13">
			<use href="#line"></use>
		</svg>









      </button>










      <form class="form form-signup" action="{{route('student_register')}}" method='post'>
            {{ csrf_field() }}
        <fieldset>
          <div class="input-block">
            <input type="text" id="student_mobile"   name="student_mobile" class="basic-slide" placeholder="شماره تلفن " value="{{old('student_mobile')}}" required>
            <label for="student_mobile" class="j">


تلفن همراه

          </label>



          </div>

          <div class="input-block">

            <input type="password" id="password" class="basic-slide" name="password_register" placeholder="رمز عبور" required>

            <label for="password" class="f">رمز عبور</label>



          </div>

          <div class="input-block">




            <input type="password" id="password-confirm" class="basic-slide" name="password_register_confirmation" placeholder="تکرار کلمه عبور" required>

            <label for="password-confirm" class="c">تکرار رمز عبور</label>


          </div>
          <ul>
          <li class="err">{{$errors->first('student_mobile')}}</li>

          <li class="err">{{ $errors->first('password_register')}}</li>

          <li class="err">{{ $errors->first('password_register_confirmation')}}</li>
</ul>

        </fieldset>
        <button type="submit" class="loginbtn">


        <span>
        ثبت نام

</span>

      </button>
      </form>
    </div>
  </div>
</section>

<footer >

  <div class="footer-copyright">

  .کلیه حقوق این مادی و معنوی مربوط به کاروفن گسترآراد  می باشد
  </div>

</footer>
  <script src="{{ asset('js/student/auth/script.js')}}"></script>

</body>
</html>
