@extends('layouts.app')
@section('content')
<!--================Hero Banner Area Start =================-->

  <!--================Hero Banner Area End =================-->


  <!--================ Innovation section Start =================-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('image/homepage/blue_bubbles_2-wallpaper-1280x800.jpg')}}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>سربرگ</h5>
          <p>متن توضیح برای هر چیزی.</p>
        
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('image/homepage/city_of_love-wallpaper-3554x1999.jpg')}}" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
        <h5>سربرگ</h5>
          <p>متن توضیح برای هر چیزی.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('image/homepage/purple_texture-wallpaper-1280x720.jpg')}}" alt="Third slide">
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
            <h3 class="primary-text">قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید <br class="d-none d-xl-block"> متن مورد نیاز</h3>
            <p class="h4 primary-text2 mb-3">قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
            <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
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
              <span class="smalltext">دانشجو</span>
            </li>
            <li class="clockdiv-single clockdiv-minute">
              <h1 class="minutes">30</h1>
              <span class="smalltext">هر چی</span>
            </li>
          </ul>
          
          <div class="clockdiv-content text-center">
            <p class="h4 primary-text2 mb-2">تاریخ ثبت اطلاعات</p>
            <a class="button button-link" href="#">ورود</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ Innovation section End =================-->


  <!--================ Join section Start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-98px">
        <p class="section-intro__title">سر برگ</p>
        <h2 class="primary-text">چرا همتا؟</h2>
      <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>


      <div class="d-lg-flex justify-content-between">
        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="fas fa-eye"></i>
          </div>
          <h3>سهولت در دسترس</h3>
          <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
        </div>

        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="fas fa-eye"></i>     
               </div>
          <h3>نمیدونم</h3>
          <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
        </div>

        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="fas fa-eye"></i>    
                </div>
          <h3>نمیدونم</h3>
          <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a class="button mr-3 mb-2" href="#">دکمه</a>
          <a class="button mb-2" href="#">دکمه</a>
        </div>
      </div>
    </div>
  </section>
  <!--================ Join section End =================-->


  <!--================ Speaker section Start =================-->
  <section class="speaker-bg section-padding">
    <div class="container">
      <div class="section-intro section-intro-white text-center pb-98px">
        <p class="section-intro__title">سربرگ</p>
        <h2 class="primary-text">اسم موسسه ها میتونه باشه</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-1.png')}}" alt="">
            <div class="speaker-footer">
              <h4>توضیح</h4>
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
              <h4>توضیح</h4>
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
              <h4>توضیح</h4>
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

        <div class="w-100 mb-50px d-none d-lg-block"></div>

        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-1.png')}}" alt="">
            <div class="speaker-footer">
              <h4>توضیح</h4>
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
              <h4>توضیح</h4>
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
              <h4>توضیح</h4>
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
  <section class="section-margin mb-5 pb-5">
    <div class="container">
      <div class="section-intro text-center pb-98px">
        <p class="section-intro__title">سربرگ</p>
        <h2 class="primary-text">قسمت زمان بندی</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div class="scheduleTab">
            <ul class="nav nav-tabs">
              <li class="nav-item text-center">
                <a data-toggle="tab" href="#day1">
                  <h4>سربرگ</h4>
                  <p>تاریخ</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a class="active" data-toggle="tab" href="#day2">
                  <h4>سربرگ</h4>
                  <p>تاریخ</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a data-toggle="tab" href="#day3">
                  <h4>سربرگ</h4>
                  <p>تاریخ</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a data-toggle="tab" href="#day4">
                  <h4>سربرگ</h4>
                  <p>تاریخ</p>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h3>اسم</h3>
                        <p>جایگاه</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h3>اسم</h3>
                        <p>جایگاه</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h3>اسم</h3>
                        <p>جایگاه</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div id="day3" class="tab-pane">
                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="day4" class="tab-pane">
                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial1.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="schedule-card">
                  <div class="row no-gutters">
                    <div class="col-md-3">
                      <div class="card-identity">
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h4>سربرگ</h4>
                        <p>تاریخ</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">تاریخ</p>
                        <a class="schedule-title" href="#">
                          <h3>عنوان هر چیز</h3>
                        </a>
                        <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
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
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-intro text-center pb-98px">
        <p class="section-intro__title">سربرگ</p>
        <h2 class="primary-text">پلن درامد زایی</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="text-center card-priceTable">
            <div class="priceTable-header">
              <h3>عادی</h3>
              <p>سربرگ</p>
              <h1 class="priceTable-price"> مبلغ</h1>
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
              <a class="button" href="#">خرید </a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="text-center card-priceTable">
            <div class="priceTable-header">
              <h3>خاص</h3>
              <p>سربرگ</p>
              <h1 class="priceTable-price"> مبلغ</h1>
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
                <span class="position"><i class="ti-check"></i></span> اپشن
              </li>
            </ul>
            <div class="priceTable-footer">
              <a class="button" href="#">خرید</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="text-center card-priceTable">
            <div class="priceTable-header">
              <h3>خاص</h3>
              <p>سربرگ</p>
              <h1 class="priceTable-price"> مبلغ</h1>
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
                <span class="position"><i class="ti-check"></i></span> اپشن
              </li>
            </ul>
            <div class="priceTable-footer">
              <a class="button" href="#">خرید</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ PriceTable section End =================-->


  <!--================ Sponsor section Start =================-->
  <section class="section-padding--small sponsor-bg">
    <div class="container">
      <div class="section-intro text-center pb-80px">
        <p class="section-intro__title">سربرگ</p>
        <h2 class="primary-text">جاهایی که باهاشون کار میکنیم</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="sponsor-wrapper mb-5 pb-4">
        <h3 class="sponsor-title mb-5">اسپانسر</h3>
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

      <div class="sponsor-wrapper sponsor-wrapper--small">
        <h3 class="sponsor-title mb-5">اسپانسر</h3>
        <div class="row">
          <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="sponsor-single">
              <img class="img-fluid" src="{{asset('image/homepage/home/sponsor-sm-1.png')}}" alt="">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="sponsor-single">
              <img class="img-fluid" src="{{asset('image/homepage/home/sponsor-sm-2.png')}}" alt="">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="sponsor-single">
              <img class="img-fluid" src="{{asset('image/homepage/home/sponsor-sm-3.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ Sponsor section End =================-->

  <!--================ Gallery section Start =================-->
  <section class="section-padding gallery-area gallery-bg">
    <div class="container">
      <div class="section-intro section-intro-white text-center pb-98px">
        <p class="section-intro__title">سربرگ</p>
        <h2 class="primary-text">سربرگ</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row no-gutters">
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g1.jpg" class="img-gal">
            <div class="single-imgs relative">				
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g1.jpg')}}" alt="">		
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g2.png" class="img-gal">
            <div class="single-imgs relative">				
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/ge.jpg')}}" alt="">		
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g3.png" class="img-gal">
            <div class="single-imgs relative">				
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g1.jpg')}}" alt="">		
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g4.png" class="img-gal">
            <div class="single-imgs relative">				
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/ge.jpg')}}" alt="">		
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g5.png" class="img-gal">
            <div class="single-imgs relative">				
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g1.jpg')}}" alt="">		
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g6.png" class="img-gal">
            <div class="single-imgs relative">				
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/ge.jpg')}}" alt="">		
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="fas fa-eye"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!--================ Gallery section End =================-->


  <!--================ Blog section Start =================-->
  
  <!--================ Blog section End =================-->
@endsection