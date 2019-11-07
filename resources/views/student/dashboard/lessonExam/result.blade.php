@extends('layouts.content')
@section('content')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/showResult.css') }}">
<div class="container">
<div class="row" dir="rtl">

        <h1>صفحه نتایج</h1>

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
                                        @foreach($lessonExams as $lessonExam)
                                        <tr>
                                            <td>{{ $lessonExam->lessonExam->exm }}</td>
                                            <td>{{ $lessonExam->blankAnswers }}</td>
                                            <td>{{ $lessonExam->correctAnswers }}</td>
                                            <td>{{ $lessonExam->wrongAnswers }}</td>
                                            <td>{{ $lessonExam->persianCreatedAt }}</td>
                                        </tr>
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
                                        @foreach($giftExams as $giftExams)
                                        <tr>
                                            <td>{{ $giftExams->giftExam->exm }}</td>
                                            <td>{{ $giftExams->blankAnswers }}</td>
                                            <td>{{ $giftExams->correctAnswers }}</td>
                                            <td>{{ $giftExams->wrongAnswers }}</td>
                                            <td>{{ $giftExams->persianCreatedAt }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

        <div id="time" dir="rtl">
            <h5 class="time-header">نشان دادن زمان ازمون</h5>
        </div>
        <hr>
        <div class="card" dir="rtl">
                <div class="card-header">
                  توضیحات ازمون
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">تعداد سوالات :<span>656</span></li>
                  <li class="list-group-item">تعداد غلط <span>656</span></li>
                  <li class="list-group-item">تعداد درست <span>656</span></li>
                  <li class="list-group-item">دانلود فایل سوال ها <span>656</span></li>
                  <li class="list-group-item">کارنامه <span>656</span></li>
                </ul>
              </div>



    </div>
    <script>


    </script>
@endsection

