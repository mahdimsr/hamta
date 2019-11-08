@extends('layouts.student_dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css\student\dashboard\transaction.css') }}">
@endsection
@section('content')

<section class="pink-bg row" >

<img class="fisrt-jpg" src="{{ asset('image/student/dashboard/Group 180.png') }}" alt="">

</section>
<section class="factor row">
<h4 dir="rtl">فاکتورها</h4>

<div id="app">
    @foreach($purchases as $purchase)
<div class="card" dir="rtl">
        <div class="card-body">


          <p class="card-body-item">نوع پرداخت :</p>
          <p class="card-body-item-second">خرید آزمون درس به درس</p>


            <p class="card-body-item">کد فاکتور :</p>
            <p class="card-body-item-second">{{ $purchase->code }}</p>


          <div class="card-body">
              <p class="card-body-item">قیمت :</p>
              <p class="card-body-item-second">{{ $purchase->price }}</p>
        </div>

            @if($purchase->discountPrice )
            <div class="card-body">
                <p class="card-body-item">قیمت با کد تخفیف :</p>
                <p class="card-body-item-with">{{ $purchase->discountPrice }}</p>
                <p class="card-body-item-second">{{ $purchase->discount->code }}</p>
            </div>
            @endif

        </div>
      </div>
@endforeach
</div>





</section>


@endsection
