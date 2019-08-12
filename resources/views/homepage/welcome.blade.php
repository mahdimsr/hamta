@extends('layouts.app')
@section('content')
<!--================Hero Banner Area Start =================-->
  <section class="hero-banner">
    <div class="container text-center">
      <span class="hero-banner-icon"><i class="flaticon-sing"></i></span>
      <p>اینجا رو نظری ندارم</p>
      <h1>سامانه همتا</h1>
      <a class="button button-header" href="#">دکمه</a>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================ Innovation section Start =================-->
  <section class="section-padding--small bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
          <div class="innovative-wrapper">
            <h3 class="primary-text">قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید <br class="d-none d-xl-block"> UX Design 2019</h3>
            <p class="h4 primary-text2 mb-3">قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
            <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
          </div>
        </div>
        <div class="col-lg-6 pl-xl-5">

          <ul class="clockdiv text-center" id="clockdiv">
            <li class="clockdiv-single clockdiv-day">
              <h1 class="days">1</h1>
              <span class="smalltext">Days</span>
            </li>
            <li class="clockdiv-single clockdiv-hour">
              <h1 class="hours">30</h1>
              <span class="smalltext">Hours</span>
            </li>
            <li class="clockdiv-single clockdiv-minute">
              <h1 class="minutes">30</h1>
              <span class="smalltext">Mins</span>
            </li>
          </ul>

          <div class="clockdiv-content text-center">
            <p class="h4 primary-text2 mb-2">January 20 -22, 2019 in Buffelo City</p>
            <a class="button button-link" href="#">Get Ticket</a>
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
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Why Join Ummet</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>


      <div class="d-lg-flex justify-content-between">
        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="flaticon-prize"></i>
          </div>
          <h3>Always First Service</h3>
          <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
        </div>

        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="flaticon-earth-globe"></i>
          </div>
          <h3>International Business</h3>
          <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید </p>
        </div>

        <div class="card-feature mb-5 mb-lg-0">
          <div class="feature-icon">
            <i class="flaticon-sing"></i>
          </div>
          <h3>World Great Speaker</h3>
          <p>قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید</p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a class="button mr-3 mb-2" href="#">Learn More</a>
          <a class="button mb-2" href="#">Buy Ticket</a>
        </div>
      </div>
    </div>
  </section>
  <!--================ Join section End =================-->


  <!--================ Speaker section Start =================-->
  <section class="speaker-bg section-padding">
    <div class="container">
      <div class="section-intro section-intro-white text-center pb-98px">
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Meet The Speakers</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-1.png')}}" alt="">
            <div class="speaker-footer">
              <h4>Jhon Leonar</h4>
              <p>UX/UI Designer Microsoft</p>
            </div>
            <div class="speaker-overlay">
              <ul class="speaker-social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-2.png')}}" alt="">
            <div class="speaker-footer">
              <h4>Donald Markin</h4>
              <p>UX/UI Designer Microsoft</p>
            </div>
            <div class="speaker-overlay">
              <ul class="speaker-social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-3.png')}}" alt="">
            <div class="speaker-footer">
              <h4>Donald Markin</h4>
              <p>UX/UI Designer Microsoft</p>
            </div>
            <div class="speaker-overlay">
              <ul class="speaker-social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="w-100 mb-50px d-none d-lg-block"></div>

        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-1.png')}}" alt="">
            <div class="speaker-footer">
              <h4>Donald Markin</h4>
              <p>UX/UI Designer Microsoft</p>
            </div>
            <div class="speaker-overlay">
              <ul class="speaker-social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-2.png')}}" alt="">
            <div class="speaker-footer">
              <h4>Donald Markin</h4>
              <p>UX/UI Designer Microsoft</p>
            </div>
            <div class="speaker-overlay">
              <ul class="speaker-social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
          <div class="card-speaker">
            <img class="card-img rounded-0" src="{{asset('image/homepage/home/speaker-3.png')}}" alt="">
            <div class="speaker-footer">
              <h4>Jhon Leonar</h4>
              <p>UX/UI Designer Microsoft</p>
            </div>
            <div class="speaker-overlay">
              <ul class="speaker-social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-instagram"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
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
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Conference Schedule</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div class="scheduleTab">
            <ul class="nav nav-tabs">
              <li class="nav-item text-center">
                <a data-toggle="tab" href="#day1">
                  <h4>Day 1</h4>
                  <p>23 jan, 2019</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a class="active" data-toggle="tab" href="#day2">
                  <h4>Day 2</h4>
                  <p>23 jan, 2019</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a data-toggle="tab" href="#day3">
                  <h4>Day 2</h4>
                  <p>23 jan, 2019</p>
                </a>
              </li>
              <li class="nav-item text-center">
                <a data-toggle="tab" href="#day4">
                  <h4>Day 2</h4>
                  <p>23 jan, 2019</p>
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
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial3.png')}}" alt="">
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial3.png')}}" alt="">
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial3.png')}}" alt="">
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial2.png')}}" alt="">
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
                        <img src="{{asset('image/homepage/testimonial/testimonial3.png')}}" alt="">
                        <h3>Adam Jamsmith</h3>
                        <p>UX/UI Designer</p>
                      </div>
                    </div>
                    <div class="col-md-9 align-self-center">
                      <div class="schedule-content">
                        <p class="schedule-date">9.00 AM - 10.30 AM</p>
                        <a class="schedule-title" href="#">
                          <h3>Previous Year achivement</h3>
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
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Choose Your Ticket</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="text-center card-priceTable">
            <div class="priceTable-header">
              <h3>Normal</h3>
              <p>Attend only first day</p>
              <h1 class="priceTable-price"><span>$</span> 45.00</h1>
            </div>
            <ul class="priceTable-list">
              <li>
                <span class="position"><i class="ti-check"></i></span> Unlimited Entrance
              </li>
              <li>
                <span class="position"><i class="ti-check"></i></span> Comfortable Seat
              </li>
              <li>
                <span class="position"><i class="ti-check"></i></span> Paid Certificate
              </li>
              <li>
                <span class="negative"><i class="ti-close"></i></span> Day One Workshop
              </li>
              <li>
                <span class="negative"><i class="ti-close"></i></span> One Certificate
              </li>
            </ul>
            <div class="priceTable-footer">
              <a class="button" href="#">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="text-center card-priceTable">
            <div class="priceTable-header">
              <h3>Advance</h3>
              <p>Attend only first day</p>
              <h1 class="priceTable-price"><span>$</span> 50.00</h1>
            </div>
            <ul class="priceTable-list">
              <li>
                <span class="position"><i class="ti-check"></i></span> Unlimited Entrance
              </li>
              <li>
                <span class="position"><i class="ti-check"></i></span> Comfortable Seat
              </li>
              <li>
                <span class="position"><i class="ti-check"></i></span> Paid Certificate
              </li>
              <li>
                <span class="negative"><i class="ti-close"></i></span> Day One Workshop
              </li>
              <li>
                <span class="negative"><i class="ti-close"></i></span> One Certificate
              </li>
            </ul>
            <div class="priceTable-footer">
              <a class="button" href="#">Buy Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="text-center card-priceTable">
            <div class="priceTable-header">
              <h3>Ultimate</h3>
              <p>Attend only first day</p>
              <h1 class="priceTable-price"><span>$</span> 60.00</h1>
            </div>
            <ul class="priceTable-list">
              <li>
                <span class="position"><i class="ti-check"></i></span> Unlimited Entrance
              </li>
              <li>
                <span class="position"><i class="ti-check"></i></span> Comfortable Seat
              </li>
              <li>
                <span class="position"><i class="ti-check"></i></span> Paid Certificate
              </li>
              <li>
                <span class="negative"><i class="ti-close"></i></span> Day One Workshop
              </li>
              <li>
                <span class="negative"><i class="ti-close"></i></span> One Certificate
              </li>
            </ul>
            <div class="priceTable-footer">
              <a class="button" href="#">Buy Now</a>
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
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Event Plan Sponsors</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="sponsor-wrapper mb-5 pb-4">
        <h3 class="sponsor-title mb-5">Gold Sponsor</h3>
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
        <h3 class="sponsor-title mb-5">Silver Sponsor</h3>
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
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Event Plan Sponsors</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="row no-gutters">
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g1.png" class="img-gal">
            <div class="single-imgs relative">
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g1.png')}}" alt="">
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="ti-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g2.png" class="img-gal">
            <div class="single-imgs relative">
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g2.png')}}" alt="">
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="ti-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g3.png" class="img-gal">
            <div class="single-imgs relative">
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g3.png')}}" alt="">
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="ti-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g4.png" class="img-gal">
            <div class="single-imgs relative">
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g4.png')}}" alt="">
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="ti-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g5.png" class="img-gal">
            <div class="single-imgs relative">
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g5.png')}}" alt="">
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="ti-plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4">
          <a href="img/gallery/g6.png" class="img-gal">
            <div class="single-imgs relative">
              <img class="card-img rounded-0" src="{{asset('image/homepage/gallery/g6.png')}}" alt="">
              <div class="overlay">
                <div class="overlay-content">
                  <div class="overlay-icon">
                    <i class="ti-plus"></i>
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
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-98px">
        <p class="section-intro__title">Join the event</p>
        <h2 class="primary-text">Why Join Ummet</h2>
        <img src="{{asset('image/homepage/home/section-style.png')}}" alt="">
      </div>

      <div class="owl-theme owl-carousel blogCarousel pb-xl-1">
        <div class="card-blog">
          <img class="card-img" src="{{asset('image/homepage/blog/blog1.png')}}" alt="">
          <div class="blog-body">
            <a href="#">
              <h3>Owls should be used to help abused children open <br class="d-none d-xl-block">
                  up in therapy sessions, says charity boss</h3>
            </a>
            <ul class="blog-info">
              <li><a href="#"><i class="ti-comments-smiley"></i> 03 Feb, 2019</a></li>
              <li><a href="#"><i class="ti-time"></i> No Comment</a></li>
            </ul>
          </div>
        </div>

        <div class="card-blog">
          <img class="card-img" src="{{asset('image/homepage/blog/blog2.png')}}" alt="">
          <div class="blog-body">
            <a href="#">
              <h3>Owls should be used to help abused children open <br class="d-none d-xl-block">
                  up in therapy sessions, says charity boss</h3>
            </a>
            <ul class="blog-info">
              <li><a href="#"><i class="ti-comments-smiley"></i> 03 Feb, 2019</a></li>
              <li><a href="#"><i class="ti-time"></i> No Comment</a></li>
            </ul>
          </div>
        </div>

        <div class="card-blog">
          <img class="card-img" src="{{asset('image/homepage/blog/blog1.png')}}" alt="">
          <div class="blog-body">
            <a href="#">
              <h3>Owls should be used to help abused children open <br class="d-none d-xl-block">
                  up in therapy sessions, says charity boss</h3>
            </a>
            <ul class="blog-info">
              <li><a href="#"><i class="ti-comments-smiley"></i> 03 Feb, 2019</a></li>
              <li><a href="#"><i class="ti-time"></i> No Comment</a></li>
            </ul>
          </div>
        </div>

        <div class="card-blog">
          <img class="card-img" src="{{asset('image/homepage/blog/blog2.png')}}" alt="">
          <div class="blog-body">
            <a href="#">
              <h3>Owls should be used to help abused children open <br class="d-none d-xl-block">
                  up in therapy sessions, says charity boss</h3>
            </a>
            <ul class="blog-info">
              <li><a href="#"><i class="ti-comments-smiley"></i> 03 Feb, 2019</a></li>
              <li><a href="#"><i class="ti-time"></i> No Comment</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ Blog section End =================-->
@endsection