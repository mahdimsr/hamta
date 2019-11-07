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
<div class="card" dir="rtl">
        <div class="card-body">


          <p class="card-body-item">نوع پراخت:</p>
          <p class="card-body-item-second">خرید آزمون درس به درس</p>


            <p class="card-body-item">کد فاکتور:</p>
            <p class="card-body-item-second">4351</p>


          <div class="card-body">
              <p class="card-body-item">قیمت نهایی:</p>
              <p class="card-body-item-second">54000</p>
            </div>
            <div class="card-body">
                <p class="card-body-item">قیمت با تخفیف:</p>
                <p class="card-body-item-with">00346</p>
                <p class="card-body-item-second">5346</p>
              </div>


        </div>
      </div>
</div>





</section>


@endsection
