<!DOCTYPE html>
<html lang="per" >
<head>
	<title>LogIn</title>
</head><link rel="stylesheet" href="{{ asset('css/student/auth/style.css') }}">
</head>
<body>
<section class="forms-section">
  <h1 class="section-title">همتا</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        ورود
        <span class="underline"></span>
      </button>
      <form class="form form-login" action="{{route('student_login')}}" method='post'>
          {{ csrf_field() }}
        <fieldset>
          <div class="input-block">
            <label for="mobile-email">شماره تلفن همراه یا پست الکترونیکی</label>
            <input type="text" id="mobile-email" name="mobile-email" placeholder="شماره تلفن همراه یا پست الکترونیکی خود را وارد نمایید" value="{{old('mobile-email')}}" required>
            <small>{{$errors->first('mobile-email')}}</small>
          </div>
          <div class="input-block">
            <label for="password">کلمه عبور</label>
            <input type="password" id="password" name="password" placeholder="کلمه عبور خود را وارد نمایید" required>
			<small>{{$errors->first('password')}}</small>
          </div>
        </fieldset>
        <button type="submit" class="btn-login">ورود</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        ثبت نام
        <span class="underline"></span>
      </button>
      <form class="form form-signup" action="{{route('student_register')}}" method='post'>
            {{ csrf_field() }}
        <fieldset>
          <div class="input-block">
            <label for="studentmobile">شماره تلفن همراه</label>
            <input type="text" id="studentmobile"  name="studentmobile" placeholder="شماره تلفن همراه خود را وارد نمایید" value="{{old('studentmobile')}}" required>
            <small>{{$errors->first('studentmobile')}}</small>
          </div>
          <div class="input-block">
            <label for="password">کلمه عبور</label>
            <input type="password" id="password" name="password_signup" placeholder="کلمه عبور خود را وارد نمایید" required>
            <small>{{ $errors->first('password_signup')}}</small>
          </div>
          <div class="input-block">
            <label for="password-confirm">تکرار کلمه عبور</label>
            <input type="password" id="password-confirm" name="password_confirmation" placeholder="تکرار کلمه عبور را وارد نمایید" required>
            <small>{{ $errors->first('password_confirmation')}}</small>
          </div>
        </fieldset>
        <button type="submit" class="btn-signup">ثبت نام</button>
      </form>
    </div>
  </div>
</section>
  <script  src="{{ asset('js/student/auth/script.js')}}"></script>

</body>
</html>
