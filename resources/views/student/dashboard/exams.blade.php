@extends('layouts.student_dashboard')
@section('style')
    <style>
        @media (min-width:992px){.s-floatL{float:left!important;}.s-floatR{float: right!important;}}

    </style>
    @endsection
@section('content')

    <div class="row" dir="rtl">



        <div class="col-md-4 s-floatR">

            <div class="card cards">
                <div class="header">
                    <h4 class="title">آزمون های درس به درس</h4>
                    <p class="category">تمامی آزمون های درس به درس به صورت کامل</p>
                </div>
                <div class="content">
                    <hr>
                    <div id="" class="">
                        <a href="{{route('student_dashboard_lessonExams')}}">
                            <img class="image" src="{{asset('image/student/dashboard/exam.jpg')}} ">
                        </a>
                    </div>

                    <div class="footer">
                        <hr style="margin-top: 20px;">
                        <h5>توضیحات</h5>
                        <p>ایرفون ورزشی X1، محصول کمپانی آمریکایی MEE Audio، گزینه‌ای شایسته برای کاربرانی‌ست که بیش از هر چیز، بر مقاومت</p>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> 4 آزمون در انتظار انتشار
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4 s-floatR">
            <div class="card cards">

                <div class="header">
                    <h4 class="title">آزمون های جایزه دار</h4>
                    <p class="category">آزمون بده جایزه بگیر</p>
                </div>
                <div class="content">
                    <hr>
                    <div id="" class="">
                        <img class="image" src="{{asset('image/student/dashboard/exam.jpg')}} ">
                    </div>
                    <div class="footer">
                        <hr style="margin-top: 20px;">
                        <h5>توضیحات</h5>
                        <p>ایرفون ورزشی X1، محصول کمپانی آمریکایی MEE Audio، گزینه‌ای شایسته برای کاربرانی‌ست که بیش از هر چیز، بر مقاومت</p>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> 4 آزمون در انتظار انتشار
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="card disabled">

                <div class="header">
                    <h4 class="title">آزمون جامع</h4>
                    <p class="category">خیلی کلی آزمون میدی همه چی داره</p>
                </div>
                <div class="content">
                    <hr>
                    <div id="" class="">
                     <a class="isDisabled tooltip-sina" aria-disabled="true" href="#">
                         <span class="tooltiptext">غیر فعال می باشد</span>
                         <img id="disableds" class="image" src="{{asset('image/student/dashboard/exam.jpg')}} ">
                     </a>

                    </div>

                    <div class="footer">
                        <hr style="margin-top: 20px;">
                        <h5>توضیحات</h5>
                        <p>ایرفون ورزشی X1، محصول کمپانی آمریکایی MEE Audio، گزینه‌ای شایسته برای کاربرانی‌ست که بیش از هر چیز، بر مقاومت</p>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> 4 آزمون در انتظار انتشار
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </div>

@endsection

