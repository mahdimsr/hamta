@extends('layouts.student_dashboard')
@section('style')
    <style>


        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
            color: #fff;
            background-color: #2daebc;
        }
        .card .content {
            padding: 0px 15px 0px 15px;
        }




         .active {
            background: none;
            color: #555;
            border-color: #2b90d9;
        }

        .nav-item{
            float: right!important;
        }
        #home-tab {
            font-size: 1.2em;
        }
         #profile-tab{
             font-size: 1.2em;
         }
         .table-striped>tbody>tr:nth-of-type(odd) {
             background-color: rgba(172, 253, 255, 0.38);
         }
         .table-striped>tbody>tr:nth-of-type(even) {
             background-color: rgba(93, 249, 68, 0.29);
         }
         .table-striped>tbody>tr:nth-of-type(odd):hover {
             background-color: rgb(255, 251, 244);
         }
         .table-striped>tbody>tr:nth-of-type(even):hover {
             background-color: rgb(241, 246, 249);
         }
    </style>
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">

        <div  class="card cards">
            <!-- Rounded tabs -->
            <ul  id="myTab" role="tablist" class="nav nav-tabs nav-pills text-right " >
                <li class="nav-item active">
                    <a id="purchase-tab" data-toggle="tab" href="#purchase" role="tab" aria-controls="purchase" aria-selected="true"  class="nav-link   ">خرید</a>
                </li>
                <li class="nav-item ">
                    <a id="charge-tab" data-toggle="tab" href="#charge" role="tab" aria-controls="charge" aria-selected="false" class="nav-link ">شارژ</a>
                </li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div id="purchase" role="tabpanel" aria-labelledby="purchase-tab" class="tab-pane active">

                    <div dir="rtl" class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead class="text-right">
                            <th>نوع</th>
                            <th>مشخصه</th>
                            <th>قیمت (تومان)</th>
                            <th>کد تخفیف - درصد</th>
                            <th>قیمت با اعمال کد تخفیف (تومان)</th>
                            <th>شناسه پرداخت</th>
                            <th>تاریخ</th>
                            </thead>
                            <tbody class="text-center">
                                @foreach($purchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->persian_itemType }}</td>
                                    <td>{{ $purchase->lessonExams->exm }}</td>
                                    <td>{{ number_format($purchase->price) }}</td>
                                    <td>{{ $purchase->discountId? $purchase->discount->code.' - '.$purchase->discount->value.'%' : '-'  }}</td>
                                    <td>{{ $purchase->discountId? number_format($purchase->discountPrice) : '-'  }}</td>
                                    <td>{{ $purchase->code }}</td>
                                    <td>{{ $purchase->persian_updatedAt }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <div id="charge" role="tabpanel" aria-labelledby="charge-tab" class="tab-pane fade ">
                    <div dir="rtl" class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead class="text-right">
                            <th>مبلغ (تومان)</th>
                            <th>کد تخفیف - درصد</th>
                            <th>مبلغ با اعمال کد تخفیف (تومان)</th>
                            <th>شناسه پرداخت</th>
                            <th>تاریخ</th>
                            </thead>
                            <tbody class="text-center">
                                @foreach($charges as $charge)
                                <tr>
                                    <td>{{ number_format($charge->price) }}</td>
                                    <td>{{ $charge->discountId? $charge->discount->code.' - '.$charge->discount->value.'%' : '-'  }}</td>
                                    <td>{{ $charge->discountId? number_format($charge->discountPrice) : '-'  }}</td>
                                    <td>{{ $charge->code }}</td>
                                    <td>{{ $charge->persian_updatedAt }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>


</div>
    </div>
@endsection
