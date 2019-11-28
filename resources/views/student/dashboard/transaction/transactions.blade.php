@extends('layouts.student_dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css\student\dashboard\transaction.css') }}">

@endsection
@section('content')
@if($purchases->isEmpty())
<div id="app">
    <img class="when-empty-image" src="{{ asset('image/student/dashboard/empty_cart.svg') }}">
    <h4 class="text-center" dir="rtl">هنوز تراکنشی ثبت نشده است.</h4>
</div>
@else
<section class="pink-bg row" >

    <img class="fisrt-jpg" src="{{ asset('image/student/dashboard/Group 180.png') }}" alt="">

    </section>
    <section class="factor row">
    <h4 dir="rtl">فاکتورها</h4>

    <div id="app">
        @foreach($purchases as $purchase)
    <div class="card" dir="rtl">
            <div class="card-body">

            <div>
              <p class="card-body-item">نوع پرداخت :</p>
              <p class="card-body-item-second">آزمون درس به درس</p>
            </div>

            <div>
                    <p class="card-body-item">مشخصه :</p>
                    <p class="card-body-item-second">{{ $purchase->lessonExam->exm }}</p>
            </div>

            <div>
                <p class="card-body-item">کد فاکتور :</p>
                <p class="card-body-item-second">{{ $purchase->code }}</p>
            </div>

              <div>
                  <p class="card-body-item">قیمت :</p>
                  <p class="card-body-item-second">{{ number_format($purchase->price) }} تومان</p>
            </div>

                @if($purchase->discountPrice )
                <div>
                    <p class="card-body-item">قیمت با کد تخفیف :</p>
                    <p class="card-body-item-with">{{ $purchase->discount->code }}</p>
                    <p class="card-body-item-second">{{ number_format($purchase->discountPrice) }} تومان</p>
                </div>
                @endif

            </div>
          </div>
    @endforeach
    </div>
    </section>
@endif

@endsection
@section('script')


@endsection
