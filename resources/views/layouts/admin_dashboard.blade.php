<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>پنل ادمین همتا</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="{{asset('css/admin/dashboard/bootstrap.min.css')}}" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="{{asset('css/admin/dashboard/animate.min.css')}}" rel="stylesheet"/>

	<!--  Light Bootstrap Table core CSS    -->
	<link href="{{asset('css/admin/dashboard/dashboard.css')}}" rel="stylesheet"/>


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="{{asset('css/admin/dashboard/demo.css')}}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-color="azure" data-image="{{asset('image/admin/dashboard/sidebar-4.jpg')}}">

		<!--

			Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
			Tip 2: you can also add an image using data-image tag

		-->

		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="#" class="simple-text">
					سامانه همتا
				</a>
			</div>

			<ul class="nav text-right ">
				<li class="{{\Illuminate\Support\Facades\Route::currentRouteName() == 'admin_dashboard' ? 'active' : ''}}">
					<a href="{{route('admin_dashboard')}}">
						<i class="pe-7s-graph "></i>
						<p>پنل کاربری</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'admin_exams' ? 'active' : ''}}">
					<a href="{{route('admin_exams')}}">
						<i class="pe-7s-user"></i>
						<p>آزمون ها</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'admin_grades' ? 'active' : ''}}">
					<a href="{{route('admin_grades')}}">
						<i class="pe-7s-note2"></i>
						<p>مقاطع تحصیلی</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'admin_orientations' ? 'active' : ''}}">
					<a href="{{route('admin_orientations')}}">
						<i class="pe-7s-news-paper"></i>
						<p>گرایش ها</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'admin_gradeLessons' ? 'active' : ''}}">
					<a href="{{route('admin_gradeLessons')}}">
						<i class="pe-7s-news-paper"></i>
						<p>درس های هر پایه</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'admin_lessons' ? 'active' : ''}}">
					<a href="{{route('admin_lessons')}}">
						<i class="pe-7s-news-paper"></i>
						<p>درس های به صورت جداگانه</p>
					</a>
				</li>
				<li class="{{Illuminate\Support\Facades\Route::currentRouteName() == 'admin_admins' ? 'active' : ''}}">
					<a href="{{route('admin_admins')}}">
						<i class="pe-7s-news-paper"></i>
						<p>ادمین ها</p>
					</a>
				</li>


			</ul>
		</div>
	</div>

	<div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
			<div class="container-fluid">
				<div class="navbar-header " style="float: right;" >
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a dir="rtl" class="navbar-brand" href="#">داشبورد</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">داشبورد</p>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-globe"></i>
								<b class="caret hidden-lg hidden-md"></b>
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

					<ul  class="nav navbar-nav text-right">
						<li>
							<a href="{{route('admin_logout')}}">

								<p >خارج شو</p>
							</a>

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
			<div class="container-fluid">
				<nav class="pull-left">
					<ul>
						<li>
							<a href="#">
								Home
							</a>
						</li>
						<li>
							<a href="#">
								Company
							</a>
						</li>
						<li>
							<a href="#">
								Portfolio
							</a>
						</li>
						<li>
							<a href="#">
								Blog
							</a>
						</li>
					</ul>
				</nav>
				<p class="copyright pull-right">
					&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
				</p>
			</div>
		</footer>

	</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{asset('js/admin/dashboard/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/dashboard/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{asset('js/admin/dashboard/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('js/admin/dashboard/bootstrap-notify.js')}}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('js/admin/dashboard/dashboard.js')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('js/admin/dashboard/demo.js')}}"></script>

@yield('script')

</html>
