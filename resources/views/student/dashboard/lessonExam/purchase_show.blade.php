@extends('layouts.content')
@section('style')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/purchase_show.css') }}">


@endsection

@section('content')



<h3 dir="rtl">سبد خرید</h3>
<section class="card-content">



<div class="card" dir="rtl">
    <div class="card-body">
        <div class="header row">
      <h5 class="card-title">آزمون شماره 1</h5>
        </div>
        <img class="hampa-logo" src="{{ asset('image/logo/logo.png') }}" dir="ltr" >

     <hr class="card-hr">
     <ul class="exam">
      <li class="exam-item">کد ازمون:</li>
      <li class="exam-item">85858</li>
    </ul>
    <ul class="price">
        <li class="price-item">قیمت:</li>
        <li class="price-item"><span>ریال</span>854148</li>
      </ul>
     <hr class="card-hr">
    <div class="cancel-icon">
     <i class="fas fa-window-close"></i>
    </div>
    </div>
  </div>


  <div class="card" dir="rtl">
        <div class="card-body">
            <div class="header row">
          <h5 class="card-title">آزمون شماره 1</h5>
            </div>
            <img class="hampa-logo" src="{{ asset('image/logo/logo.png') }}" dir="ltr" >
    
         <hr class="card-hr">
         <ul class="exam">
          <li class="exam-item">کد ازمون:</li>
          <li class="exam-item">85858</li>
        </ul>
        <ul class="price">
            <li class="price-item">قیمت:</li>
            <li class="price-item"><span>ریال</span>854148</li>
          </ul>
         <hr class="card-hr">
        <div class="cancel-icon">
         <i class="fas fa-window-close"></i>
        </div>
        </div>
      </div>

      


      <div class="card" dir="rtl">
            <div class="card-body">
                <div class="header row">
              <h5 class="card-title">آزمون شماره 1</h5>
                </div>
                <img class="hampa-logo" src="{{ asset('image/logo/logo.png') }}" dir="ltr" >
        
             <hr class="card-hr">
             <ul class="exam">
              <li class="exam-item">کد ازمون:</li>
              <li class="exam-item">85858</li>
            </ul>
            <ul class="price">
                <li class="price-item">قیمت:</li>
                <li class="price-item"><span>ریال</span>854148</li>
              </ul>
             <hr class="card-hr">
            <div class="cancel-icon">
             <i class="fas fa-window-close"></i>
            </div>
            </div>
          </div>

          


          <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="header row">
                  <h5 class="card-title">آزمون شماره 1</h5>
                    </div>
                    <img class="hampa-logo" src="{{ asset('image/logo/logo.png') }}" dir="ltr" >
            
                 <hr class="card-hr">
                 <ul class="exam">
                  <li class="exam-item">کد ازمون:</li>
                  <li class="exam-item">85858</li>
                </ul>
                <ul class="price">
                    <li class="price-item">قیمت:</li>
                    <li class="price-item"><span>ریال</span>854148</li>
                  </ul>
                 <hr class="card-hr">
                <div class="cancel-icon">
                 <i class="fas fa-window-close"></i>
                </div>
                </div>  
              </div>
            

 

</section>


<section class="form-content">
<form dir="rtl">
        <div class="form-row">
                <div class="form-group input-inline">
                <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="کد تخفیف">
                      </div>
            
             <div class="col">
                <button type="submit" class="btn btn-success">اعمال</button>
        
          </div>
                </div>
           
      
          <ul class="form-price">
              <li class="form-price-item">قیمت نهایی:</li>
              <li class="form-price-item-p">567000</li>
          </ul>
          <ul class="form-price-with">
                <li class="form-price-with-item">قیمت با اعتصاب تخفیف:</li>
                <li class="form-price-with-item-p">567000</li>
            </ul>
        </div>
        <button type="button" class="btn btn-success btn-lg btn-block remaining">پرداخت از موجودی کیف پول</button>

      </form>

</section>


        


      





               



              


            
        
    
      

  

@endsection

