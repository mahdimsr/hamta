@extends('layouts.student_dashboard')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-style1">
                <div id="clock">
                    <div class="text-center" style="padding: 20px 20px 20px 20px;">
                        <h2> جایگاه روز شمار</h2>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div dir="rtl" class="">
        <h4>امکانات شخصی سازی شده سامانه برای شما: </h4>
    </div>
    <div class="row equal ">
        <div class="col-md-3  ">
            <img class="pic-card" src="{{ asset('image/student/dashboard/Scholarship2.jpg') }}" alt="" width="100%"
                 height="100%">
        </div>
        <div class="col-md-3  ">
            <div class="row">
                <div class="col-md-6" style="padding: 0px 5px 0px 0px;">
                    <img class="pic-card" src="{{ asset('image/student/dashboard/stepbystep-exam1.jpg') }}" alt=""
                         width="100%" height="100%">
                </div>
                <div class="col-md-6" style="padding: 0px 0px 0px 5px;">
                    <img class="pic-card" src="{{ asset('image/student/dashboard/stepbystep-exam1.jpg') }}" alt=""
                         width="100%" height="100%">
                </div>
            </div>
            <div class="row equal">
                <div class="col-md-12" style="padding: 10px 0px 0px 0px; ">
                    <img class="pic-card" src="{{ asset('image/student/dashboard/stepbystep-exam1.jpg') }}" alt=""
                         width="100%" height="100%">
                </div>
            </div>
        </div>
        <div class="col-md-6  ">
            <img class="pic-card" src="{{ asset('image/student/dashboard/stepbystep-exam.jpg') }}" alt="" width="100%"
                 height="100%">
        </div>
    </div>

@endsection
