<!DOCTYPE html>
<html lang="per" >
<head>
  <title> همپا | ورود دانش آموزان</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
  <link href="{{asset('css/student/auth/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('css/student/auth/mdb.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/student/auth/style.css') }}">

</head>

<style>
    html,
    body,
    header,
    .view {
      height: 100%;


    }
    /* @media (min-width: 560px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view  {
        height: 650px;
      }
    } */


  </style>
</head>
<body>

  
<section class="view intro-2">

     <form class="form form-login" method='post'>
                    {{ csrf_field() }}

      <div class="mask rgba-stylish-strong  h-100 d-flex justify-content-center align-items-center">
        <div class="container">

          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body mx-3">

                  <!-- Header -->
                  <div class="form-header purple-gradient">

                    <h3 class="font-weight-500 my-2 py-1"> بازیابی کلمه عبور</h3>
                  </div>

                  <!-- Body -->
                  <div class="md-form md-outline">
                    <input type="text" id="orangeForm-name" class="form-control " >
                    <label for="orangeForm-name">گذرواژه خود را وارد کنید</label>
                    <small class="text-danger font-weight-bold">{{$errors->first('mobile_email')}}</small>

                  </div>

                  <div class="md-form md-outline">
                    <input type="password" id="orangeForm-email" class="form-control" >
                    <label for="orangeForm-email">تکرار گذر واژه</label>
                    <small class="text-danger font-weight-bold">{{$errors->first('password')}}</small>

           


                  </div>





                  <div class="text-center">
                    <button class="btn purple-gradient btn-lg">ورود</button>

                  </div>
                </form>
      

                            </div>
              

                          </div>
                        </div>
                      </div>
         
                    </div>
                    </div>
          

                       
                        </section>



  <script  src="{{asset('js/student/auth/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script  src="{{asset('js/student/auth/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script  src="{{asset('js/student/auth/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script  src="{{asset('js/student/auth/mdb.js')}}"></script>

  <!-- Custom scripts -->
 



</body>
</html>
