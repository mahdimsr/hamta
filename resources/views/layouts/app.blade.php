<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>صفحه اول</title>
	<link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">

	<link rel="icon" href="{{asset('image/homepage/Fevicon.png')}}" type="image/png">
	<link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css')}}">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
		  integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<link rel="stylesheet" href="{{asset('css/homepage/style.css')}}">
</head>
<body>

<!--================ Header Menu Area start =================-->
<header class="header_area">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container box_1620">
				<a class="navbar-brand logo_h" href="{{route('homepage')}}"><img
							src="{{asset('image/homepage/logo.png')}}" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">

					<ul class="nav-right text-center text-lg-right py-1 py-lg-0">


						<li class="btn btn-outline-secondary"><a href="{{ route('student_auth') }}">دانش آموزان</a></li>
					</ul>
					<ul class="nav-right text-center text-lg-right py-1 py-lg-0">

						<li class="btn btn-outline-info"><a href="#"> اساتید</a></li>

					</ul>

					<ul class="nav navbar-nav menu_nav justify-content-end">
						<li class="nav-item"><a class="nav-link" href="#exams">آزمون های همتا</a></li>
						<li class="nav-item"><a class="nav-link" href="#comments">همتا از دید بقیه</a></li>
						<li class="nav-item"><a class="nav-link" href="#team">تیم همتا</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}#hamta">چرا همتا؟</a>
					</ul>

				</div>
			</div>
		</nav>
	</div>
</header>
<!--================Header Menu Area =================-->
@yield('content')
<!-- ================ start footer Area ================= -->
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>سربرگ</h6>
					<p>
					ویکی‌پدیا یک دانشنامه برخط چندزبانه مبتنی بر وب با محتوای آزاد و همکاری باز است که با همکاری افراد داوطلب نوشته می‌شود و هر کسی که به اینترنت و وب دسترسی داشته باشد می‌تواند مقالات						برده‌اند برای تجدید
					</p>
				</div>
			</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6 class="sec">سربرگ</h6>
					<div class="row">
						<div class="col">
							<ul>
								<li><a href="#">لینک</a></li>
								<li><a href="#">لینک</a></li>
								<li><a href="#">لینک</a></li>
								<li><a href="#">لینک</a></li>
							</ul>
						</div>
						<div class="col">
							<ul>
								<li><a href="#">لینک</a></li>
								<li><a href="#">لینک</a></li>
								<li><a href="#">لینک</a></li>
								<li><a href="#">لینک</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6 class="thi">سربرگ</h6>
					<p class="thi">

						قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان
						برده‌اند برای تجدید
					</p>

				</div>
			</div>

		</div>
	</div>
	<div class="footer-bottom">
		<div class="container text-center">
            <p>.تمامی حقوق مادی و معنوی این وب سایت متعلق به شرکت کاروفن گسترآراد می باشد</p>
		</div>
	</div>
</footer>
<!-- ================ End footer Area ================= -->


<script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/homepage/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/homepage/main.js')}}"></script>


</body>
</html>
