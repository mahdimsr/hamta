@extends('layouts.student_dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/purchase_show.css') }}">
<style>
    .errors-bg{
        margin: 10px 0;
      padding: 10px;
      border-radius: 3px 3px 3px 3px;
      color: #D8000C;
      background-color: #FFBABA;
      font-size: 1.5rem
    }
    .success{
        margin: 10px 0;
        padding: 8px 12px 4px;
      border-radius: 3px 3px 3px 3px;
      color: #270;
      background-color: #DFF2BF;
      font-size: 1.5rem
    }

</style>
@endsection

@section('content')
@if(!$cart->isEmpty())
@foreach($cart as $item)
<section class="card-content">
<div class="card" dir="rtl">
    <div class="card-body">
        <div class="header row">
      <h5 class="card-title">{{ $item->lessonExam->title }}</h5>
        </div>
        <img class="hampa-logo" src="{{ asset('image/logo/logo.png') }}" dir="ltr" >

     <hr class="card-hr">
     <ul class="exam">
      <li class="exam-item">کد ازمون :</li>
      <li class="exam-item">{{ $item->lessonExam->exm }}</li>
    </ul>
    <ul class="price">
        <li class="price-item">قیمت :</li>
        <li class="price-item">{{ $item->lessonExam->price }}<span> تومان </span></li>
      </ul>
     <hr class="card-hr">
    <div class="cancel-icon">
     <a href="{{ route('student_dashboard_cart_remove',['id'=> $item->id]) }}"><i class="fas fa-window-close"></i></a>
    </div>
    </div>
</div>
</section>
@endforeach
<section class="form-content">
<form action="" dir="rtl" method="post">

        {{csrf_field()}}
        <div class="form-row">
                <div class="form-group input-inline">
                <div class="col-md-6 mb-3">
                        <input id="discountCodeInput" name="discountCode" type="text" class="form-control" placeholder="کد تخفیف" value="{{ old('discountCode') }}">
                        <span id="discountError"></span>
                    </div>

             <div class="col">
                <button type="button" class="btn btn-success" onclick="submitDiscountCode()">اعمال</button>

          </div>
                </div>


          <ul class="form-price">
              <li class="form-price-item">قیمت :</li>
              <li class="form-price-item-p">{{ $price }}<span> تومان </span></li>
          </ul>
          <ul class="form-price-with">
                <li class="form-price-with-item">قیمت با اعمال کد تخفیف :</li>
                <li id="finalPrice" class="form-price-with-item-p"></li>
          </ul>
          <div>
                @if($errors->has('transactionFailed'))
                <div class="errors-bg">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('transactionFailed') }}
                </div>
                @endif
                @if($errors->has('notEnoughCharge'))
                <div class="errors-bg">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('notEnoughCharge') }}
                </div>
                @endif
                @if($errors->has('chargeFailed'))
                <div class="errors-bg">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('chargeFailed') }}
                </div>
                @endif
                @if($errors->has('invalidDiscountCode'))
                <div class="errors-bg">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('invalidDiscountCode') }}
                </div>
                @endif
                @if($errors->has('discountUsability'))
                <div class="errors-bg">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('discountUsability') }}
                </div>
                @endif
          </div>
        </div>
        @if($student->wallet<$price)
        <div class="row">
            <div class="col-md-6">
            <button id="purchaseWalletBtn" onclick="setRoute('{{route('student_dashboard_cart_purchaseWallet')}}')"
                    type="submit" class="btn btn-success btn-lg btn-block remaining" disabled>
                پرداخت با کیف پول
            </button>
            </div>
            <div class="col-md-6">
            <button id="purchaseBankBtn" type="submit" class="btn btn-success btn-lg btn-block remaining" onclick="setRoute('{{route('student_dashboard_cart_purchaseBank')}}')">
                پرداخت از طریق درگاه بانکی
            </button>
            </div>
        </div>
        @else
        <button id="purchaseWalletBtn" onclick="setRoute('{{route('student_dashboard_cart_purchaseWallet')}}')"
        type="submit" class="btn btn-success btn-lg btn-block remaining">
            پرداخت با کیف پول
        </button>
        @endif
      </form>
</section>
@else
<div id="app">
    <img class="when-empty-image" src="{{ asset('image/student/dashboard/empty_cart.svg') }}">
    <h4 class="text-center" dir="rtl">سبد خرید شما خالیست!</h4>
</div>
@endif
@endsection

@section('script')
    <script>


    function submitDiscountCode()
    {
        const discountCode  = $('#discountCodeInput').val();
        const discountError = document.querySelector('#discountError');
        const finalPrice    = document.querySelector('#finalPrice');

        const price  = {{$price}};
        const wallet = {{ $student->wallet }};

        $.ajax({

            type : "POST",
            url  : "{{route('student_dashboard_cart_discount')}}",
            data :
                {

                    discountCode : discountCode,
                    _token       : '{{csrf_token()}}'
                },

            success : (result) =>
            {
                discountError.innerText = null;

                if (result.status === 'error')
                {
                    discountError.innerText = result.errorMessage;
                }
                else if (result.status === 'success')
                {

                    discountError.innerText = result.successMessage;
                    discountPrice = price * ((100 - result.discountCode.value) / 100);
                    finalPrice.innerText = discountPrice + ' تومان ' ;

                    if(wallet > discountPrice && wallet < price)
                    {
                        $('#purchaseWalletBtn').prop('disabled', false);
                        $('#purchaseBankBtn').remove();
                    }

                }

            },
        });
    }


    function setRoute(route)
    {
        const form = document.querySelector("form");
        form.action = route;
    }

    </script>
@endsection
