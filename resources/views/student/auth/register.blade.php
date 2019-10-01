<!DOCTYPE html>
<html lang="per" >
<head>
  <title>همپا | ثبت نام دانش آموزان</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
  <link href="{{asset('css/student/auth/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('css/student/auth/mdb.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/student/auth/style.css') }}">


</head>

<style>
    html,
    body,
    header,
    .view {
      height: 100%;


    }
    @media (min-width: 560px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view  {
        height: 650px;
      }
    }


  </style>
</head>
<body>

  <!-- Main Navigation -->


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
              <a class="navbar-brand" href="{{ route('student_register_show') }}"><strong>همپا | دانش آموزان</strong></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                          <a class="nav-link" href="{{ route('homepage') }}">خانه</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('student_login_show') }}">ورود<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student_register_show') }}">ثبت نام</a>
                      </li>
                  </ul>
              </div>
            </div>
          </nav>

<section class="view intro-2">
<form class="form form-signup" action="{{route('student_register')}}" method='post'>
                    {{ csrf_field() }}

      <div class="mask rgba-stylish-strong  h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body mx-3">

                  <!-- Header -->
                  <div class="form-header purple-gradient">

                    <h3 class="font-weight-500 my-2 py-1">ثبت نام</h3>
                  </div>

                  <!-- Body -->
                  <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" id="orangeForm-name" class="form-control "  name="student_mobile" value="{{old('student_mobile')}}">
                    <label for="orangeForm-name">شماره تلفن همراه</label>
                    <small class="text-danger font-weight-bold">{{$errors->first('student_mobile')}}</small>

                  </div>

                  <div class="md-form">
                    <i class="fas fa-lock prefix white-text"></i>
                    <input type="password" id="orangeForm-name" class="form-control "  name="password_register" value="{{old('password_register')}}">
                    <label for="orangeForm-name">رمز عبور</label>
                    <small class="text-danger font-weight-bold">{{ $errors->first('password_register')}}</small>

                  </div>

                  <div class="md-form">
                    <i class="fas fa-lock prefix white-text"></i>
                    <input type="password" id="orangeForm-email" class="form-control" name="password_register_confirmation">
                    <label for="orangeForm-email">تکرار رمز عبور</label>
                    <small class="text-danger font-weight-bold">{{ $errors->first('password_register_confirmation')}}</small>





                  </div>





                  <div class="text-center">
                    <button class="btn purple-gradient btn-lg">ثبت نام</button>

                  </div>
                  <hr class="young-passion-gradient color-block mb-3 mx-auto rounded-circle z-depth-1">
                </div>

                </div>
              </div>
              <!-- Form with header -->

            </div>
          </div>
        </div>
      </div>
        </form>
    </section>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
  .تمامی حقوق مادی و معنوی این وب سایت متعلق به شرکت کاروفن گسترآراد می باشد
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

  <script  src="{{asset('js/student/auth/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script  src="{{asset('js/student/auth/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script  src="{{asset('js/student/auth/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script  src="{{asset('js/student/auth/mdb.js')}}"></script>

  <!-- Custom scripts -->
  <script>

    new WOW().init();

  </script>



</body>
</html>
