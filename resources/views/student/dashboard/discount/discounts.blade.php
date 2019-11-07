@extends('layouts.content')
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
                    <div dir="rtl" class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead class="text-right">
                            <th>کد تخفیف</th>
                            <th>درصد</th>
                            <th>قابل استفاده برای</th>
                            <th>تاریخ انقضا</th>
                            </thead>
                            <tbody class="text-center">
                                @foreach($studentDiscounts as $studentDiscount)
                                @if($studentDiscount->discount->isValid())
                                <tr>
                                    <td>{{ $studentDiscount->discount->code }}</td>
                                    <td>% {{ $studentDiscount->discount->value }}</td>
                                    <td>{{ $studentDiscount->discount->usable() }} بار</td>
                                    <td>{{ $studentDiscount->discount->persianEndDate }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
</div>
@endsection


