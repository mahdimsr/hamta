@extends('layouts.student_dashboard')
@section('style')
    <style>
        @media (min-width: 990px) {
            .row.equal {
                display: flex;
                flex-wrap: wrap;
            }

        }

        @media (min-width: 1200px) and (max-width: 1740px) {
            .card-text1 {
                font-size: 5em;
                font-weight: 400;
            }

        }

        @media (min-width: 1800px) {
            .card-text1 {
                font-size: 9em;
                font-weight: 400;
            }
        }


        a#link {
            display: contents;
        }
    </style>
@endsection
@section('content')


    <div dir="rtl" class="">
        <h4>امکانات سامانه: </h4>
    </div>

    <div class="row equal ">

        <a id="link" >
            <div class="col-md-4 col-margin ">
                <p class="card-text1 disabled">آزمون جامع</p>
                <img class="pic-card disabled" src="{{ asset('image/student/dashboard/General-exam.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>

        <a id="link" href="{{ route('student_dashboard_scholarship_form') }}">
            <div class="col-md-4 col-margin ">
                <p class="card-text1 ">آزمون جایزه دار</p>
                <img class="pic-card" src="{{ asset('image/student/dashboard/gift-exam.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>

        <a id="link" href="{{ route('student_dashboard_lessonExams') }}">
            <div class="col-md-4 col-margin ">
                <p class="card-text1 ">آزمون درس به درس</p>
                <img class="pic-card" src="{{ asset('image/student/dashboard/exam-lesson.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>
    </div>

    <div class="row equal ">


        <a id="link" >
            <div class="col-md-4 col-margin ">
                <p class="card-text1 disabled">من و مشاورم</p>
                <img class="pic-card disabled" src="{{ asset('image/student/dashboard/me-and-the.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>

        <a id="link" >
            <div class="col-md-4 col-margin ">
                <p class="card-text1 disabled ">کلاس آنلاین</p>
                <img class="pic-card disabled" src="{{ asset('image/student/dashboard/online-class.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>

        <a id="link" href="{{ route('student_dashboard_lessonExams') }}">
            <div class="col-md-4 col-margin ">
                <p class="card-text1 ">بورسیه</p>
                <img class="pic-card" src="{{ asset('image/student/dashboard/scholarship3.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>
    </div>


    <div class="row equal ">
        <div class="col-md-4 col-margin " >
            <a href="#">
            <div class="row " style="margin-top: 0px;">
                <div class="col-md-12" >
                    <p class="card-text1 disabled">معرفی دبیر</p>
                    <img class="pic-card disabled" src="{{ asset('image/student/dashboard/Teacher.jpg') }}" alt="" width="100%"
                         height="100%">
                </div>
            </div>
            </a>
            {{--<div class="row ">--}}
                {{--<div class="col-md-12">--}}

                {{--</div>--}}
            {{--</div>--}}

        </div>


            <div class="col-md-4 col-margin " >
                <div class="row " style="margin-top: 0px;">
                    <div class="col-md-12" >
                <p class="card-text1 disabled">فرصتی تا کنکور</p>
                <img class="pic-card disabled" src="{{ asset('image/student/dashboard/to-konkor.jpg') }}" alt="" width="100%"
                     height="100%">
                    </div>
                </div>
                <div class="row " style="    margin-top: 5px;">
                    <div class="col-md-12" >
                        <p class="card-text1 disabled">بحث و گفتگو</p>
                        <img class="pic-card disabled" src="{{ asset('image/student/dashboard/discussion.jpg') }}" alt="" width="100%"
                             height="100%">
                    </div>
                </div>
                <div class="row " >
                    <div class="col-md-12"style="    margin-top: 5px;">
                        <p class="card-text1 disabled">بازی و سرگرمی</p>
                        <img class="pic-card disabled" src="{{ asset('image/student/dashboard/game1.jpg') }}" alt="" width="100%"
                             height="100%">
                    </div>
                </div>

            </div>


        <a id="link" href="#">
            <div class="col-md-4 col-margin ">
                <p class="card-text1 disabled">کتب کمک درسی</p>
                <img class="pic-card disabled" src="{{ asset('image/student/dashboard/books.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>
    </div>

@endsection
