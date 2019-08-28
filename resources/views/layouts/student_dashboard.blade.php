<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>همتا | پنل دانش آموز</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
	<meta name="viewport" content="width=device-width"/>


	<!-- Bootstrap core CSS     -->
	<link href="{{asset('css/student/dashboard/bootstrap.min.css')}}" rel="stylesheet"/>
	<!-- Animation library for notifications   -->
	<link href="{{asset('css/student/dashboard/animate.min.css')}}" rel="stylesheet"/>

	<!--  Light Bootstrap Table core CSS    -->
	<link href="{{asset('css/student/dashboard/dashboard.css')}}" rel="stylesheet"/>


	<!--  CSS for Demo Purpose, dont include it in your project     -->
	<link href="{{asset('css/student/dashboard/demo.css')}}" rel="stylesheet"/>
	<link href="{{asset('css/student/dashboard/select2.min.css')}}" rel="stylesheet"/>

	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet"/>
	<link href="{{asset('css/student/dashboard/stroke.css')}}" rel="stylesheet"/>
	<link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">

	{{-- datePicker --}}
	<link href="{{asset('datePicker/persian-datepicker.min.css')}}" rel="stylesheet"/>

	<style>
		th
		{
			text-align: center;
		}

		.error
		{
			color: red;
			font-size: 15px;
		}

		/*		body{
					font-family: IRANSans-web;
					font-style: normal;
					font-weight: bold;
				}*/

	</style>
</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-color="blue" data-image="{{asset('image/student/dashboard/sidebar-5.jpg')}}">

		<!--

			Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
			Tip 2: you can also add an image using data-image tag

		-->

		<div class="sidebar-wrapper">
			<div class="logo" dir="rtl">
				<a class="simple-text">
					{{$student->isComplete==0 ? 'دانش آموز گرامی خوش آمدی!' :$student->name.' '.$student->familyName.' خوش آمدی!' }}
				</a>
			</div>
			<ul class="nav text-right ">
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_profile' ? 'active' : ''}}">
					<a href="{{ route('student_dashboard_profile')}}">
						<i class="fa fa-user"></i>
						<p>{{$student->isComplete==0?'تکمیل اطلاعات' : 'ویرایش اطلاعات'}}</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_exams' ? 'active' : ''}}">
					<a href="{{route('student_dashboard_exams')}}">
						<i class="fa fa-file"></i>
						<p>آزمون های آنلاین</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'student_dashboard_scholarship' ? 'active' : ''}}">
					<a href="{{ route('student_dashboard_scholarship')}}">
						<i class="fa fa-graduation-cap"></i>
						<p>بورسیه</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-file-video-o"></i>
						<p>ویدیو آموزشی</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-university"></i>
						<p>کلاس های آنلاین</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-users"></i>
						<p>من و مشاورم</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-book"></i>
						<p>کتاب های کمک درسی</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-clock-o"></i>
						<p>فرصتی تا کنکور</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-gamepad"></i>
						<p>بازی و سرگرمی</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-newspaper-o "></i>
						<p>معرفی دبیر</p>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-comments-o"></i>
						<p>بحث و گفتگو</p>
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
					<a dir="rtl" class="navbar-brand" href="{{ route('student_dashboard_profile') }}"></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a id="cart" href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bank"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>

								<p id="cartItems" class="notification hidden-sm hidden-xs"></p>

							</a>
						</li>
						<li class="dropdown">
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
						</li>
						<li>
							<a href="">
								<i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">جست وجو</p>
							</a>
						</li>
					</ul>

					<ul class="nav navbar-nav text-right">
						<li class="dropdown">
							<a href="{{ route('student_logout') }}" class="dropdown-toggle" data-toggle="dropdown"
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
									<a href="#"> حساب کاربری</a>
								</li>
								<li>
									<a href="#"> تنظیمات</a>
								</li>
								<li>
									<a href="#"> خروج</a>
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

				<div class="col-lg-5 col-md-6" style="float: right;">
					<h3>صفحات سایت</h3>
					<ul class="list-unstyled three-column">

						<li>درباره</li>
						<li>تماس با ما</li>
						<li>صفحه اصلی</li>
						<li>نمونه سوالات</li>
						<li>آخرین اخبار</li>

					</ul>

				</div>


				<div class="col-lg-3" style="float: right;">
					<h3>آخرین تغییرات</h3>
					<img class="img-thumbnail" src="" alt=""/>
					<img class="img-thumbnail" src="" alt=""/>
					<br>
					<img class="img-thumbnail" src="" alt=""/>
					<img class="img-thumbnail" src="" alt=""/>
				</div>
				<div class="col-lg-4 col-md-6" style="float: right;">
					<h3>دسترسی سریع</h3>
					>
					<ul class=" socila-list">
						<li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
						<li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
						<li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
						<li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
						<li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
						<li><img href="#" src="http://placehold.it/48x48" alt=""/></li>
					</ul>
				</div>

			</div>

			<div class="copyright text-center">
				تمام حقوق این سامانه مطلق است به <span>فناور گستر آرا</span>
			</div>
		</footer>

	</div>
</div>


</body>
<!--   Core JS Files   -->
<script src="{{asset('js/student/dashboard/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
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
		allowClear: true,
	});
	$(".hide-search").select2({
		minimumResultsForSearch: Infinity
	});
</script>

@yield('script')

</html>

