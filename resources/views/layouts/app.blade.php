<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>صفحه اول</title>
	<link rel="icon" href="{{asset('image/homepage/Fevicon.png')}}" type="image/png">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css')}}">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

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
            <h6>سربرگ</h6>
            <p>
              قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>سربرگ</h6>
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
            <h6>سربرگ</h6>
            <p>
              قانون به حکومت اجازه می‌دهد تا طبقاتی از کارکنان وظیفه‌ای که خدمت دوره ضرورت را به پایان برده‌اند برای تجدید								
            </p>								
        
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
  <script src="{{asset('js/homepage/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('js/homepage/main.js')}}"></script>



</body>
</html>