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
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
    <!--     datePicker     -->


    @yield('style')

    <style>
        .sidebar .nav i {
            font-size: 15px;

        }
        @media (min-width: 990px) {
            .row.equal {
                display: flex;
                flex-wrap: wrap;
            }
            .sidebar{
                width: 350px;
            }
            .sidebar .sidebar-wrapper{
                width: 350px;
            }
            .navbar-right {

                margin-right: -7px;
            }
            .sidebar .logo .simple-text {
                margin-left: 20px;
            }
        }
        th
        {
            text-align : center;
        }

        @media (min-width:992px)
        {
            .s-floatL{float:left!important;}
            .s-floatR{float: right!important;}
        }

    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" >



        <div class="sidebar-wrapper">

            <ul class="nav text-right ">
                <li class="user-profile">
                    <img src="{{ asset('image/student/dashboard/profile1.png') }}" alt="">

                </li>
                <div class="logo" dir="rtl">
                    <a class="simple-text">
                        امیر رضا محمدی
                    </a>
                </div>
<hr id="sidebar-hr">
                <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i>
                        <p class="slider-par"> حساب کاربری</p>
                        <span class="slider-span">اطلاعات شخصی شما</span>
                    </a>
                </li>
<hr id="sidebar-hr">
                <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == '' ? 'active' : ''}}">
                    <a href="">
                        <i class="fa fa-file"></i>
                        <p class="slider-par">آزمون های من</p>
                        <span class="slider-span"> :تعداد آزمون ها شما</span>
                    </a>
                </li>

                <hr id="sidebar-hr">

                <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}}">
                    <a href="{{ route('student_dashboard_scholarship_form')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <p class="slider-par">بورسیه</p>
                        <span class="slider-span"> :نتیجه درخواست شما</span>
                    </a>
                </li>

<hr id="sidebar-hr">

                <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}} disabled">
                    <a >
                        <i class="fa fa-graduation-cap"></i>
                        <p class="slider-par">فرصتی تا کنکور</p>
                        <span class="slider-span">نکات کنکوری</span>
                    </a>
                </li>


            <hr id="sidebar-hr">
            <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}} disabled">
                <a >
                    <i class="fa fa-graduation-cap"></i>
                    <p class="slider-par">بازی و سرگرمی</p>
                    <span class="slider-span">:تعداد سرگرمی ها</span>
                </a>
            </li>

            <hr id="sidebar-hr">
            <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}} disabled">
                <a>
                    <i class="fa fa-graduation-cap"></i>
                    <p class="slider-par">معرفی دبیر</p>
                    <span class="slider-span">:تعداد دبیران معرفی شده</span>
                </a>
            </li>

            <hr id="sidebar-hr">
            <li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}} disabled">
                <a >
                    <i class="fa fa-graduation-cap"></i>
                    <p class="slider-par">بحث و گفتگو</p>
                    <span class="slider-span">:تعداد افراد آنلاین</span>
                </a>
            </li>

                <hr id="sidebar-hr">
                <li style="margin-bottom: 8px;">
                    <a>
                        <p class="slider-par">:باقیمانده کیف پول</p>
                    </a>
                    <a id="addfund1" href="#">
                        <span id="addfund">< خرید مقداری اعتبار</span>
                    </a>
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

                        <li>
                            <a class="active" href="{{route('student_dashboard_cart_form')}}">
                                سبد خرید
                            </a>
                        </li>
                        <li>
                            <a class="active" href="{{ route('test') }}">
                                شرکت در آزمون
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{route('student_dashboard_lessonExams')}}">
                                آزمون های درس به درس
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
                                        <a href="{{ route('student_dashboard_results') }}">نتایج آزمون ها</a>
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
<hr>

        <div class="content">
            <div class="container-fluid">
                @yield('content')

            </div>
        </div>




    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('js/student/dashboard/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/student/dashboard/popup.js')}}"></script>

<script src="{{asset('js/student/dashboard/bootstrap.min.js')}}" type="text/javascript"></script>


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
    require('jquery-countdown');
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
<script src="{{asset('js/student/dashboard/jquery.countdown.min.js')}}"></script>

@yield('script')

</html>

