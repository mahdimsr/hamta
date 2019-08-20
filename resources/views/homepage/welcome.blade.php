@extends('layouts.app')
@section('content')
	<!--================Hero Banner Area Start =================-->

	<!--================Hero Banner Area End =================-->


	<!--================ Innovation section Start =================-->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="{{asset('image/homepage/blue_bubbles_2-wallpaper-1280x800.jpg')}}"
					 alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>سربرگ</h5>
					<p>متن توضیح برای هر چیزی.</p>

				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="{{asset('image/homepage/city_of_love-wallpaper-3554x1999.jpg')}}"
					 alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>سربرگ</h5>
					<p>متن توضیح برای هر چیزی.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="{{asset('image/homepage/purple_texture-wallpaper-1280x720.jpg')}}"
					 alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>سربرگ</h5>
					<p>متن توضیح برای هر چیزی.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!--================Hero Banner Area End =================-->



	<!--================ Innovation section Start =================-->
	<section class="section-padding--small bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 align-self-center mb-5 mb-lg-0">
					<div class="innovative-wrapper">
						<h3 class="primary-text">.همتا یک سامانه برای موفقیت توست</h3>
						<p class="h4 primary-text2 mb-3">بیش از 100 هزار دانش آموز.</p>
						<p>بیش از 100 عدد آزمون</p>
					</div>
				</div>
				<div class="col-lg-6 pl-xl-5">

					<ul class="clockdiv text-center" id="clockdiv">
						<li class="clockdiv-single clockdiv-day">
							<h1 class="days">1</h1>
							<span class="smalltext">آزمون</span>
						</li>
						<li class="clockdiv-single clockdiv-hour">
							<h1 class="hours">30</h1>
							<span class="smalltext">دانش آموز</span>
						</li>
						<li class="clockdiv-single clockdiv-minute">
							<h1 class="minutes">30</h1>
							<span class="smalltext">استاد</span>
						</li>
					</ul>

					<div class="clockdiv-content text-center">
						<p class="h4 primary-text2 mb-2">آخرین اطلاعات</p>
						<a class="button button-link" href="#">از همینجا عضو همتا شو</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ Innovation section End =================-->


	<!--================ Join section Start =================-->
	<section class="section-margin" id="hamta">
		<div class="container">
			<div class="section-intro text-center pb-98px">
				{{--<p class="section-intro__title">سر برگ</p>--}}
				<h2 class="primary-text">چرا همتا؟</h2>
				<img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
			</div>


			<div class="d-lg-flex justify-content-between">
				<div class="card-feature mb-5 mb-lg-0">
					<div class="feature-icon">
						<i class="fas fa-eye"></i>
					</div>
					<h3>آزمون جایزه دار</h3>
					<p>آزمون بده پول بگیر</p>
				</div>

				<div class="card-feature mb-5 mb-lg-0">
					<div class="feature-icon">
						<i class="fas fa-eye"></i>
					</div>
					<h3>آزمون درس به درس</h3>
					<p>پول بده آزمون بگیریم</p>
				</div>

				<div class="card-feature mb-5 mb-lg-0">
					<div class="feature-icon">
						<i class="fas fa-eye"></i>
					</div>
					<h3>اپلیکیشن</h3>
					<p>دراز بکش و آزمون بده و پول بگیر</p>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12 text-center">
					<a class="button mr-3 mb-2" href="{{route('student_auth')}}">همتایی شو</a>
				</div>
			</div>
		</div>
	</section>
	<!--================ Join section End =================-->


	<!--================ Speaker section Start =================-->
	<section class="speaker-bg section-padding" id="team">
		<div class="container">
			<div class="section-intro section-intro-white text-center pb-98px">
				{{--<p class="section-intro__title">سربرگ</p>--}}
				<h2 class="primary-text">تیم همتا</h2>
				<img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
			</div>

			<div class="row">
				<div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
					<div class="card-speaker">
						<img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-1.png')}}" alt="">
						<div class="speaker-footer">
							<h4>نریمان خرم نیا</h4>
							<p>توضیح</p>
						</div>
						<div class="speaker-overlay">
							<ul class="speaker-social">
								<li><a href="#"><i class="fas fa-quote-right"></i></a></li>
								<li><a href="#"><i class="fas fa-comment"></i></a></li>
								<li><a href="#"><i class="fas fa-envelope"></i></a></li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
					<div class="card-speaker">
						<img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-2.png')}}" alt="">
						<div class="speaker-footer">
							<h4>نریمان خرم نیا</h4>
							<p>توضیح</p>
						</div>
						<div class="speaker-overlay">
							<ul class="speaker-social">
								<li><a href="#"><i class="fas fa-quote-right"></i></a></li>
								<li><a href="#"><i class="fas fa-comment"></i></a></li>
								<li><a href="#"><i class="fas fa-envelope"></i></a></li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
					<div class="card-speaker">
						<img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-3.png')}}" alt="">
						<div class="speaker-footer">
							<h4>نریمان خرم نیا</h4>
							<p>توضیح</p>
						</div>
						<div class="speaker-overlay">
							<ul class="speaker-social">
								<li><a href="#"><i class="fas fa-quote-right"></i></a></li>
								<li><a href="#"><i class="fas fa-comment"></i></a></li>
								<li><a href="#"><i class="fas fa-envelope"></i></a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ Speaker section End =================-->


	<!--================ Schedule section Start =================-->
	<section class="section-margin mb-5 pb-5" id="comments">
		<div class="container">
			<div class="section-intro text-center pb-98px">
				{{--<p class="section-intro__title">سربرگ</p>--}}
				<h2 class="primary-text">همتا از دید بقیه</h2>
				<img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
			</div>

			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="scheduleTab">
						<ul class="nav nav-tabs">
							<li class="nav-item text-center">
								<a data-toggle="tab" href="#day1">
									<h4>از دید اساتید</h4>
									<p>توضیح</p>
								</a>
							</li>
							<li class="nav-item text-center">
								<a class="active" data-toggle="tab" href="#day2">
									<h4>از دید دانش آموزان</h4>
									<p>توضیح</p>
								</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div id="day1" class="tab-pane">

								<div class="schedule-card">
									<div class="row no-gutters">
										<div class="col-md-3">
											<div class="card-identity">
												<img src="{{asset('image/homepage/testimonial/testimonial1.png')}}"
													 alt="">
												<h4>نام استاد</h4>
												<p>ریاضی</p>
											</div>
										</div>
										<div class="col-md-9 align-self-center">
											<div class="schedule-content">
												<p class="schedule-date">1/1/98</p>
												<a class="schedule-title" href="#">
													<h3>در باره سوال های همتا فرمودن:</h3>
												</a>
												<p>سوالاشون خوبه</p>
											</div>
										</div>
									</div>
								</div>

								<div class="schedule-card">
									<div class="row no-gutters">
										<div class="col-md-3">
											<div class="card-identity">
												<img src="{{asset('image/homepage/testimonial/testimonial1.png')}}"
													 alt="">
												<h4>نام استاد</h4>
												<p>ریاضی</p>
											</div>
										</div>
										<div class="col-md-9 align-self-center">
											<div class="schedule-content">
												<p class="schedule-date">1/1/98</p>
												<a class="schedule-title" href="#">
													<h3>در باره سوال های همتا فرمودن:</h3>
												</a>
												<p>سوالاشون خوبه</p>
											</div>
										</div>
									</div>
								</div>


							</div>
							<div id="day2" class="tab-pane active">

								<div class="schedule-card">
									<div class="row no-gutters">
										<div class="col-md-3">
											<div class="card-identity">
												<img src="{{asset('image/homepage/testimonial/testimonial1.png')}}"
													 alt="">
												<h3>اسم دانش آموز</h3>
												<p>تجربی</p>
											</div>
										</div>
										<div class="col-md-9 align-self-center">
											<div class="schedule-content">
												<p class="schedule-date">1/1/98</p>
												<a class="schedule-title" href="#">
													<h3>درباهر آزمون های جایزه دار میگه:</h3>
												</a>
												<p>آزموناشو دوست دارم.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="schedule-card">
									<div class="row no-gutters">
										<div class="col-md-3">
											<div class="card-identity">
												<img src="{{asset('image/homepage/testimonial/testimonial1.png')}}"
													 alt="">
												<h3>اسم دانش آموز</h3>
												<p>تجربی</p>
											</div>
										</div>
										<div class="col-md-9 align-self-center">
											<div class="schedule-content">
												<p class="schedule-date">1/1/98</p>
												<a class="schedule-title" href="#">
													<h3>درباهر آزمون های جایزه دار میگه:</h3>
												</a>
												<p>آزموناشو دوست دارم.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="schedule-card">
									<div class="row no-gutters">
										<div class="col-md-3">
											<div class="card-identity">
												<img src="{{asset('image/homepage/testimonial/testimonial1.png')}}"
													 alt="">
												<h3>اسم دانش آموز</h3>
												<p>تجربی</p>
											</div>
										</div>
										<div class="col-md-9 align-self-center">
											<div class="schedule-content">
												<p class="schedule-date">1/1/98</p>
												<a class="schedule-title" href="#">
													<h3>درباهر آزمون های جایزه دار میگه:</h3>
												</a>
												<p>آزموناشو دوست دارم.</p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ Schedule section End =================-->


	<!--================ PriceTable section Start =================-->
	<section class="section-padding bg-gray" id="exams">
		<div class="container">
			<div class="section-intro text-center pb-98px">
				{{--<p class="section-intro__title">سربرگ</p>--}}
				<h2 class="primary-text">آزمون ها</h2>
				<img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="text-center card-priceTable">
						<div class="priceTable-header">
							<h3>آزمون جایزه دار</h3>
							<p>جایزه داره</p>
							<h1 class="priceTable-price">رایگان</h1>
						</div>
						<ul class="priceTable-list">
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="negative"><i class="ti-close"></i></span> اپشن
							</li>
						</ul>
						<div class="priceTable-footer">
							<a class="button" href="#">شرکت در آزمون</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="text-center card-priceTable">
						<div class="priceTable-header">
							<h3>آزمون درس به درس</h3>
							<p>برای هر درس در هر پایه</p>
							<h1 class="priceTable-price">5000 تومان</h1>
						</div>
						<ul class="priceTable-list">
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="negative"><i class="ti-close"></i></span> اپشن
							</li>
						</ul>
						<div class="priceTable-footer">
							<a class="button" href="#">شرکت در آزمون</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="text-center card-priceTable">
						<div class="priceTable-header">
							<h3>آزمون جامع</h3>
							<p>از همه آزمون میگیرم</p>
							<h1 class="priceTable-price">50000 تومان</h1>
						</div>
						<ul class="priceTable-list">
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="position"><i class="ti-check"></i></span> اپشن
							</li>
							<li>
								<span class="negative"><i class="ti-close"></i></span> اپشن
							</li>
						</ul>
						<div class="priceTable-footer">
							<a class="button" href="#">شرکت در آزمون</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ PriceTable section End =================-->


	<!--================ Sponsor section Start =================-->
	<section class="section-padding--small sponsor-bg" id="">
		<div class="container">
			<div class="section-intro text-center pb-80px">
				{{--<p class="section-intro__title">سربرگ</p>--}}
				<h2 class="primary-text">جاهایی که باهاشون کار میکنیم</h2>
				<img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
			</div>

			<div class="sponsor-wrapper mb-5 pb-4">
				<h3 class="sponsor-title mb-5">آموزشگاه ها</h3>
				<div class="row">
					<div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
						<div class="sponsor-single">
							<img class="img-fluid" src="{{asset('image/homepage/home/sponsor1.png')}}" alt="">
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
						<div class="sponsor-single">
							<img class="img-fluid" src="{{asset('image/homepage/home/sponsor2.png')}}" alt="">
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
						<div class="sponsor-single">
							<img class="img-fluid" src="{{asset('image/homepage/home/sponsor3.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ Sponsor section End =================-->

	<!--================ Gallery section Start =================-->

	<!--================ Gallery section End =================-->


	<!--================ Blog section Start =================-->

	<!--================ Blog section End =================-->
@endsection