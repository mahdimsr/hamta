<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>همپا | دانش آموز</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/student/dashboard/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Animation library for notifications   -->
    <link href="{{asset('css/student/dashboard/animate.min.css')}}" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->

    <link href="{{asset('css/student/dashboard/dashboard.css')}}" rel="stylesheet"/>
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
    <!--  CSS for Demo Purpose, dont include it in your project     -->
    <link href="{{asset('css/student/dashboard/demo.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/student/dashboard/select2.min.css')}}" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
    <!--     datePicker     -->
    <link href="{{asset('datePicker/persian-datepicker.min.css')}}" rel="stylesheet"/>

    @yield('style')

    <style>
        th
        {
            text-align : center;
        }



    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue"  data-image="{{asset('image/student/dashboard/pattern.jpg')}}">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">

            <ul class="nav text-right ">
                <li class="user-profile">
                    <img src="{{ asset('image/student/dashboard/full-screen-image-3.jpg') }}" alt="">

                </li>
                <div class="logo" dir="rtl">
                        <a class="simple-text">
                            {{$student->isComplete==0 ? 'دانش آموز گرامی خوش آمدی!' :$student->name.' '.$student->familyName.' خوش آمدی!' }}
                        </a>
                    </div>
                <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_exams' ? 'active' : ''}}">
                    <a href="{{route('student_dashboard_exams')}}">
                        <i class="fa fa-file"></i>
                        <p>آزمون های من</p>
                    </a>
                </li>
                <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}}">
                    <a href="{{ route('student_dashboard_scholarship_form')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <p>بورسیه</p>
                    </a>
                </li>
                <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-file-video"></i>
                        <p>کد های تخفیف من</p>
                    </a>
                </li>
                <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-university"></i>
                        <p>کیف پول من</p>
                    </a>
                </li>
                <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-users"></i>
                        <p>اطلاعات شخصی من</p>
                    </a>
                </li>
                {{-- <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-book"></i>
                        <p>کتاب های کمک درسی</p>
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-clock"></i>
                        <p>فرصتی تا کنکور</p>
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-gamepad"></i>
                        <p>بازی و سرگرمی</p>
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-newspaper"></i>
                        <p>معرفی دبیر</p>
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="isDisabled tooltip-sina" aria-disabled="true" href="#" style="color: #a0abb1">
                        <span class="tooltiptext">!!!در حال راه اندازی</span>
                        <i class="fa fa-comments"></i>
                        <p>بحث و گفتگو</p>
                    </a>
                </li> --}}


                <li class="bagdet">
                    <div class="badget-content">
                        <div class="badget-header">میتونه عنوان باشه</div>
                        <div class="badget-rem">باقی مانده پول رو به این شکل اینجا بزاریم</div>
                    </div>
                </li>


            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header " style="float: right;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a dir="rtl" class="navbar-brand" href=""></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if(isset($cart))
                            <li>
                                <a href="{{route('student_dashboard_lessonExams_purchaseForm')}}">
                                    <i class="fa fa-wallet"></i>
                                    <p class="hidden-lg hidden-md">لیست خرید</p>
                                    <span class="notification hidden-sm hidden-xs">{{count($cart)}}</span>
                                </a>
                            </li>
                        @endif 
                        {{-- <li>
                            <a href="{{route('student_dashboard_wallet_form')}}">
                                <i class="fa fa-wallet"></i>
                                <p class="hidden-lg hidden-md">کیف پول</p>
                                <span class="notification hidden-sm hidden-xs">{{$student->wallet}}</span>
                            </a>
                        </li> --}}
                        {{-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <i class="fa fa-globe"></i>

                                <b class="caret "></b>
                                <p class="hidden-lg hidden-md">
                                    اعلان ها
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">اعلان 1</a></li>
                                <li><a href="#">اعلان 2</a></li>
                                <li><a href="#">اعلان 3</a></li>
                                <li><a href="#">اعلان 4</a></li>
                                <li><a href="#"> اعلان</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">جست وجو</p>
                            </a>
                        </li> --}}
                        <li>
                            <a class="active" href="{{route('student_dashboard_lessonExams_result')}}">
                           ایتم اول
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{route('student_test')}}">
                               ایتم دوم
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{route('student_test')}}">
                                ایتم سوم
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav text-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <b class="caret "></b>
                                <p class="hidden-lg hidden-md">

                                    حساب کاربری
                                    <b class="caret hidden-sm hidden-xs"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('student_dashboard_profile_form')}}">ویرایش پروفایل</a>
                                </li>
                                <li>
                                    <a href="{{ route('student_dashboard_transactions') }}">تراکنش های من</a>
                                </li>
                                <li>
                                    <a href="{{ route('student_dashboard_discounts') }}">کد تخفیف</a>
                                </li>
                                <li>
                                    <a href="{{ route('student_dashboard_logout') }}"> خروج</a>
                                </li>

                            </ul>

                        </li>

                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div dir="rtl" class="row">
                <div class="col-md-4">
                    <ul class=" socila-list">
                        <li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
                        <li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
                        <li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
                        <li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
                        <li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
                        <li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <p class="copyright pull-right">
                        تمامی حقوق این سایت متعلق به شرکت کاروفن گستر آراد می باشد.
                    </p>
                </div>
            </div>
        </footer>

    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
    <symbol id="close" viewBox="0 0 18 18">
        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
			  S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
			  l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
			  c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
			  s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
    </symbol>
</svg>


</body>
<!--   Core JS Files   -->
<script src="{{asset('js/student/dashboard/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/student/dashboard/popup.js')}}"></script>

<script src="{{asset('js/student/dashboard/bootstrap.min.js')}}" type="text/javascript"></script>

<!-- Date Picker -->
<script src="{{asset('datePicker/persian-date.min.js')}}" type="text/javascript"></script>
<script src="{{asset('datePicker/persian-datepicker.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/student/dashboard/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/student/dashboard/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{asset('js/student/dashboard/select2.min.js')}}"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('js/student/dashboard/dashboard.js')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('js/student/dashboard/demo.js')}}"></script>
<script>
    //Bootstrap Validation
    /* (function() {
     'use strict';
     window.addEventListener('load', function() {
     // Fetch all the forms we want to apply custom Bootstrap validation styles to
     var forms = document.getElementsByClassName('needs-validation');
     // Loop over them and prevent submission
     var validation = Array.prototype.filter.call(forms, function(form) {
     form.addEventListener('submit', function(event) {
     if (form.checkValidity() === false) {
     event.preventDefault();
     event.stopPropagation();
     }
     form.classList.add('was-validated');
     }, false);
     });
     }, false);
     })(); */
    //Drop down optional
    $(".menu").select2({
        allowClear : true,
    });
    $(".hide-search").select2({
        minimumResultsForSearch : Infinity
    });
    $(".tags").select2({
        tags            : true,
        tokenSeparators : [',', ' ']
    })
</script>

@yield('script')

</html>

