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
                    <a id="lessonExam-tab" data-toggle="tab" href="#lessonExam" role="tab" aria-controls="lessonExam" aria-selected="true"  class="nav-link   ">درس به درس</a>
                </li>
                <li class="nav-item ">
                    <a id="giftExam-tab" data-toggle="tab" href="#giftExam" role="tab" aria-controls="giftExam" aria-selected="false" class="nav-link ">جایزه بگیر</a>
                </li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div id="lessonExam" role="tabpanel" aria-labelledby="lessonExam" class="tab-pane active">

                    <div dir="rtl" class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                    <thead class="text-right">
                                    <th>کد آزمون</th>
                                    <th>بدون پاسخ</th>
                                    <th>تعداد پاسخ صحیح</th>
                                    <th>تعداد پاسخ غلط</th>
                                    <th>تاریخ شرکت</th>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach($results as $result)
                                        @if($result->type=='LESSONEXAM')
                                        <tr>
                                            <td>{{ $result->lessonExam->exm }}</td>
                                            <td>{{ $result->blankAnswers }}</td>
                                            <td>{{ $result->correctAnswers }}</td>
                                            <td>{{ $result->wrongAnswers }}</td>
                                            <td>{{ $result->persianCreatedAt }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>

                    </div>

                </div>
                <div id="giftExam" role="tabpanel" aria-labelledby="giftExam" class="tab-pane fade ">
                    <div dir="rtl" class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                    <thead class="text-right">
                                    <th>کد آزمون</th>
                                    <th>بدون پاسخ</th>
                                    <th>تعداد پاسخ صحیح</th>
                                    <th>تعداد پاسخ غلط</th>
                                    <th>تاریخ شرکت</th>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach($results as $result)
                                        @if($result->type=='GIFTEXAM')
                                        <tr>
                                            <td>{{ $result->lessonExam->exm }}</td>
                                            <td>{{ $result->blankAnswers }}</td>
                                            <td>{{ $result->correctAnswers }}</td>
                                            <td>{{ $result->wrongAnswers }}</td>
                                            <td>{{ $result->persianCreatedAt }}</td>
                                        </tr>
                                        @endif
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

