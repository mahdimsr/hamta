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
    <div class="row">
        <div class="col-md-4 col-md-offset-2">

            <a aria-controls="buy" data-toggle="tab" href="#buy" role="tab">   <div class="card-transaction-red">
                    <div class="card-transaction-header">
                        <p>خرید محصول</p>
                    </div>
                    <div class="card-transaction-body">
                        <svg class="svg-hover-transaction" xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                            <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                        </svg>
                        <svg class="svg-hover-transaction" xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                            <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                        </svg>
                        <svg class="svg-hover-transaction" xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                            <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                        </svg>
                    </div>
                </div>
            </a>
            </div>


        <div class="col-md-4">
               <a aria-controls="charge" data-toggle="tab" href="#charge" role="tab"> <div class="card-transaction-blue">
                    <div class="card-transaction-header">
                            <p>شارژ اعتبار</p>
                    </div>

                    <div class="card-transaction-body">

                            <svg  class="svg-hover-transaction" xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                                <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                            </svg>
                            <svg class="svg-hover-transaction" xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                                <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                            </svg>
                            <svg  class="svg-hover-transaction" xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                                <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                            </svg>

                    </div>
                </div>
               </a>
        </div>
    </div>
<div class="card-transaction">
    <div class="tab-content">
        <div class="tab-pane active" id="charge" role="tabpanel">
            sdgfsgd
        </div>
        <div class="tab-pane" id="buy" role="tabpanel">
            dsssssssssssss
        </div>
    </div>
</div>

    <hr>
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
