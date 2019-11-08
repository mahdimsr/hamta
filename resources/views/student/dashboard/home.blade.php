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
        <h4>امکانات شخصی سازی شده سامانه برای شما: </h4>
    </div>

    <div class="row equal ">
        <a id="link" href="#">
            <div class="col-md-8  ">
                <p class="card-text1 ">آزمون درس به درس</p>
                <img class="pic-card" src="{{ asset('image/student/dashboard/exam-lesson.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>

        <a id="link" href="#">
            <div class="col-md-4  ">
                <p class="card-text1 ">بورسیه همپا</p>
                <img class="pic-card" src="{{ asset('image/student/dashboard/scholarship3.jpg') }}" alt="" width="100%"
                     height="100%">
            </div>
        </a>
    </div>

@endsection
