@extends('layouts.student_dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css\student\dashboard\transaction.css') }}">

@endsection
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-2">

            <a aria-controls="purchase" data-toggle="tab" href="#purchase" id="purchase-tab" role="tab" onclick="purchaseactive()" >   <div class="card-transaction-red" >
                    <div class="card-transaction-header">
                        <p>خرید محصول</p>
                    </div>
                    <div class="card-transaction-body" >
                        <svg class="svg-hover-transaction " xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                            <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                        </svg>
                        <svg class="svg-hover-transaction " xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                            <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                        </svg>
                        <svg class="svg-hover-transaction " xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                            <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                        </svg>
                    </div>
                </div>
            </a>
            </div>


        <div class="col-md-4">
               <a aria-controls="charge" data-toggle="tab"  href="#charge" id="charge-tab" role="tab" onclick="chargeactive()"> <div class="card-transaction-blue  "  >
                    <div class="card-transaction-header">
                            <p>شارژ اعتبار</p>
                    </div>

                    <div class="card-transaction-body">

                            <svg  class="svg-hover-transaction "  xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                                <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                            </svg>
                            <svg class="svg-hover-transaction " xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                                <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                            </svg>
                            <svg  class="svg-hover-transaction " xmlns="http://www.w3.org/2000/svg" width="140.218" height="73.415" viewBox="0 0 140.218 73.415">
                                <path id="Polygon_1" data-name="Polygon 1" d="M60.925,8.76a12,12,0,0,1,17.151,0l40.961,41.845A12,12,0,0,1,110.461,71H28.539a12,12,0,0,1-8.575-20.394Z" transform="matrix(-1, -0.017, 0.017, -1, 138.979, 73.415)"  opacity="0.39"/>
                            </svg>

                    </div>
                </div>
               </a>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="charge" role="tabpanel">


                @if($charges->isEmpty())
                <div class="card-transaction">
                    <div class="col-md-4 col-md-offset-4 ">
                    <img src="{{ asset('image/student/dashboard/empty_cart.svg') }}" width="100%" height="100%">

                    </div>
                    <h4 style="display: table-footer-group; margin-top: 10px;" class="text-center" dir="rtl">هنوز تراکنشی ثبت نشده است.</h4>
            </div>
                @else
            <section class="factor row">
                <div id="app">
                    @foreach($charges as $charge)
                <div class="card" dir="rtl">
                        <div class="card-body">

                        <div>
                            <p class="card-body-item">تاریخ :</p>
                            <p class="card-body-item-second">{{ $charge->persian_updatedAt }} </p>
                        </div>

                        <div>
                            <p class="card-body-item">شناسه پرداخت :</p>
                            <p class="card-body-item-second">{{ $charge->code }}</p>
                        </div>

                          <div>
                              <p class="card-body-item">مبلغ شارژ :</p>
                              <p class="card-body-item-second">{{ number_format($charge->price) }} تومان</p>
                        </div>

                            @if($charge->discountPrice )
                            <div>
                                <p class="card-body-item">مبلغ شارژ با اعمال کد تخفیف :</p>
                                <p class="card-body-item-with">کد : {{ $charge->discount->code }} - {{ $charge->discount->value }} %</p>
                                <p class="card-body-item-second">{{ number_format($charge->discountPrice) }} تومان</p>
                            </div>
                            @endif

                        </div>
                      </div>
                @endforeach
                </div>
                </section>
                @endif

        </div>
        <div class="tab-pane" id="purchase" role="tabpanel">
                @if($purchases->isEmpty())
                <div class="card-transaction">
                        <div class="col-md-4 col-md-offset-4 ">
                            <img src="{{ asset('image/student/dashboard/empty_cart.svg') }}" width="100%" height="100%">
                        </div>
                        <h4 style="display: table-footer-group; margin-top: 10px;" class="text-center" dir="rtl">هنوز تراکنشی ثبت نشده است.</h4>
                </div>
                @else
            <section class="factor row">
                <div id="app">
                    @foreach($purchases as $purchase)
                <div class="card" dir="rtl">
                        <div class="card-body">
                                <div>
                                        <p class="card-body-item">تاریخ :</p>
                                        <p class="card-body-item-second">{{ $purchase->persian_updatedAt }} </p>
                                    </div>
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
                                <p class="card-body-item-with">کد : {{ $purchase->discount->code }} - {{ $purchase->discount->value }} %</p>
                                <p class="card-body-item-second">{{ number_format($purchase->discountPrice) }} تومان</p>
                            </div>
                            @endif

                        </div>
                      </div>
                @endforeach
                </div>
                </section>
                @endif

        </div>

</div>



@endsection
@section('script')
    <script>

    @if (Session::get('tab')=='purchase')
    $("#purchase-tab").tab('show');
    $('#purchase-tab svg').removeClass('svg-hover-transaction');
    @endif

    function purchaseactive()
    {
        $('#purchase-tab svg').removeClass('svg-hover-transaction');
        $('#charge-tab svg').addClass('svg-hover-transaction');
    }

    function chargeactive()
    {
        $('#charge-tab svg').removeClass('svg-hover-transaction');
        $('#purchase-tab svg').addClass('svg-hover-transaction');
    }

    </script>

@endsection
