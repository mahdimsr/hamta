@extends('layouts.content')
@section('style')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/purchase_show.css') }}">
@endsection

@section('content')


<h3 dir="rtl">سبد خرید</h3>
<section class="card-content">


@foreach($cart as $item)
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
     <a href="{{ route('student_dashboard_lessonExams_removeCartItem',['id'=> $item->id]) }}"><i class="fas fa-window-close"></i></a>
    </div>
    </div>
  </div>
@endforeach
</section>


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
                {{ $errors->first('discountUsability') }}
                {{ $errors->first('invalidDiscountCode') }}
                {{ $errors->first('chargeFailed') }}
          </div>
        </div>
        @if($student->wallet<$price)
        <div class="row">
            <div class="col-md-6">
            <button id="purchaseWalletBtn" onclick="purchaseWallet('{{route('student_dashboard_lessonExams_purchaseWallet')}}')"
                    type="submit" class="btn btn-success btn-lg btn-block remaining" disabled>
                پرداخت با کیف پول
            </button>
            </div>
            <div class="col-md-6">
            <button id="purchaseBankBtn" type="submit" class="btn btn-success btn-lg btn-block remaining" onclick="purchaseBank('{{route('student_dashboard_wallet_purchaseLessonExam')}}')">
                پرداخت از طریق درگاه بانکی
            </button>
            </div>
        </div>
        @else
        <button id="purchaseWalletBtn" onclick="purchaseWallet('{{route('student_dashboard_lessonExams_purchaseWallet')}}')"
        type="submit" class="btn btn-success btn-lg btn-block remaining">
            پرداخت با کیف پول
        </button>
        @endif
      </form>

</section>

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
            url  : "{{route('student_dashboard_lessonExams_validateDiscountCode')}}",
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

                    console.log(result);
                }

            },

            error : (error) =>
            {
                console.log(error);
            }

        });
    }


    function purchaseWallet(route)
    {
        const form = document.querySelector("form");

        console.log(form);

        form.action = route;
    }


    function purchaseBank(route)
    {
        const form = document.querySelector("form");

        console.log(route);

        form.action = route;
    }

    </script>
@endsection
