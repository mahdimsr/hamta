<!DOCTYPE html>
<html lang="per" >
<head>
  <title> همپا | ورود دانش آموزان</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
  <link href="{{asset('css/student/auth/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
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

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
                <div class="container">
                  <a class="navbar-brand" href="{{ route('student_login_show') }}"><strong>همپا | دانش آموزان</strong></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                      <ul class="navbar-nav ml-auto">
                          <li class="nav-item ">
                              <a class="nav-link" href="{{ route('homepage') }}">خانه</a>
                          </li>
                          <li class="nav-item  active">
                            <a class="nav-link" href="{{ route('student_login_show') }}">ورود<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('student_register_show') }}">ثبت نام</a>
                          </li>
                      </ul>
                  </div>
                </div>
              </nav>

<section class="view intro-2">

     <form class="form form-login" action="{{route('student_login')}}" method='post'>
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

                    <h3 class="font-weight-500 my-2 py-1"> ورود به سامانه</h3>
                  </div>

                  <!-- Body -->
                  <div class="md-form md-outline">
                    <input type="text" id="orangeForm-name" class="form-control "  name="mobile_email" value="{{ $studentInfo ? $studentInfo : old('mobile_email') }}">
                    <label for="orangeForm-name">تلفن همراه یا پست الکترونیکی</label>
                    <small class="text-danger font-weight-bold">{{$errors->first('mobile_email')}}</small>

                  </div>

                  <div class="md-form md-outline">
                    <input type="password" id="orangeForm-email" class="form-control" name="password" value="{{ $studentPass ? $studentPass : old('password') }}">
                    <label for="orangeForm-email">رمز عبور</label>
                    <small class="text-danger font-weight-bold">{{$errors->first('password')}}</small>

                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialChecked2" name="remember" {{ $studentInfo ? 'checked' : ''  }}>
                <label class="form-check-label" for="materialChecked2">مرا به خاطر بسپار</label>
                </div>



                  </div>





                  <div class="text-center">
                    <button class="btn purple-gradient btn-lg">ورود</button>

                  </div>
                </form>
                  <hr class="young-passion-gradient color-block mb-3 mx-auto rounded-circle z-depth-1">
                      <p class="text-center">
                  <a href="#" class="font-weight-bold cyan-lighter-hover" data-toggle="modal" data-target="#darkModalForm">رمز عبور خود را فراموش کرده ام</a></p>
                  <!-- Modal -->



                    <div class="modal fade" id="darkModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered form-dark" role="document">
                      <!--Content-->
                      <div class="modal-content card card-image">
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                          <!--Header-->
                          <div class="modal-header text-center pb-4">
                            <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>رمز خود را فراموش</strong> <a
                                class="blue-text font-weight-bold"><strong> کردید؟</strong></a></h3>
                            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!--Body-->
                          <div class="modal-body">
                            <!--Body-->
                            <form action="{{ route ('student_forgetPassword') }}" method="POST">
                               {{ csrf_field() }}
                            <div class="md-form md-outline">
                              <input type="text" name="forgetPassword" id="Form-email5" class="form-control white-text" value="{{ old('forgetPassword') }}">
                              <label  for="Form-email5">پست الکترونیکی یا تلفن همراه</label>
                            </div>
                            <small class="text-danger font-weight-bold">{{$errors->first('forgetPassword')}}</small>
                            <div class="md-form pb-3 text-center">
                                <button type="submit" class="btn purple-gradient">بازیابی</button>


                            </div>
                            </form>


                            </div>


                            </div>
                            <!--Grid row-->

                          </div>
                        </div>
                      </div>
                      <!--/.Content-->
                    </div>
                    </div>
                    <!-- Modal -->


                                    </div>
                                    </div>
                                  </div>
                                  <!-- Form with header -->

                                </div>
                              </div>
                            </div>
                          </div>

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
        toastr.options = {
            "positionClass": "md-toast-bottom-right",
          }
    new WOW().init();
    @if ($errors->has('message'))
    @{{ toastr.error('اطلاعات وارد شده صحیح نیست'); }}
    @endif
    @if ($errors->has('forgetPassword'))
    $('#darkModalForm').modal('show');
    @endif
    @if ($errors->has('forgetMessage'))
    $('#darkModalForm').modal('show');
    @{{ toastr.error('اطلاعات وارد شده صحیح نیست'); }}
    @endif
    @if (Session::get('status')=='sentToMobile')
    $('#darkModalForm').modal('show');
    @{{ toastr.success('رمز عبور جدید برای تلفن همراه شما ارسال گردید'); }}
    @endif
    @if (Session::get('status')=='sentToEmail')
    $('#darkModalForm').modal('show');
    @{{ toastr.success('رمز عبور جدید برای پست الکترونیکی شما ارسال گردید'); }}
    @endif
  </script>



</body>
</html>
