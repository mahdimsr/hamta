<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ummet Event - Home</title>
	<link rel="icon" href="{{asset('image/homepage/Fevicon.png')}}" type="image/png">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/flat-icon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('css/homepage/style.css')}}">
</head>
<body>

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="{{route('homepage')}}"><img src="{{asset('image/homepage/logo.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item active"><a class="nav-link" href="{{route('homepage')}}">صفحه اول</a></li>
              <li class="nav-item"><a class="nav-link" href="#">صفحه دوم</a></li>
              <li class="nav-item"><a class="nav-link" href="#">صفحه دوم</a>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">صفحه سوم</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="#">صفحه سوم</a>
                  <li class="nav-item"><a class="nav-link" href="#">صفحه چهارم</a>
                  <li class="nav-item"><a class="nav-link" href="#">صفحه چهارم</a>
                </ul>
							</li>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">صفحه چهارم</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="#">Blog Single</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">دکمه ورود</a></li>
                </ul>
							</li>
              <li class="nav-item"><a class="nav-link" href="#">ارتباط</a></li>
            </ul>

            <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
              <li><a href="#">دکمه ورود</a></li>
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
            <h6>About Umeet</h6>
            <p>
              قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Navigation Links</h6>
            <div class="row">
              <div class="col">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Feature</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Portfolio</a></li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>
              قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید
            </p>
            <div id="mc_embed_signup">
              <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                <div class="input-group d-flex flex-row">
                  <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                  <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>
                </div>
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">InstaFeed</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li><img src="{{asset('image/homepage/img/instagram/i1.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i2.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i3.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i4.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i5.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i6.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i7.jpg')}}" alt=""></li>
              <li><img src="{{asset('image/homepage/img/instagram/i8.jpg')}}" alt=""></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 col-sm-12 footer-social text-center text-lg-right">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ================ End footer Area ================= -->




  <script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/homepage/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('js/homepage/main.js')}}"></script>



</body>
</html>