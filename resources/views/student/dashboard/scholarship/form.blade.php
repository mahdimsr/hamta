@extends('layouts.student_dashboard')
@section('style')
    <style>
        @media (min-width:992px){.s-floatL{float:left!important;}.s-floatR{float: right!important;}}
    </style>
    <link href="{{asset('css/student/dashboard/Input-style.css')}}" rel="stylesheet"/>
@endsection

@section('content')
@if($student->isComplete==0)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div  class="card-empty">
           <img src="{{ asset('image/student/dashboard/empty1.jpg') }}" height="100%" width="100%">
            <p class="text-center">متاسفانه هنوز اطلاعات حساب کاربری خود را تکمیل نکرده اید. با مراجعه به بخش حساب کاربری اطلاعات ثبت نام خود را تکمیل نموده و دوباره امتحان نمایید.</p>
        </div>
    </div>
</div>
@else
    <div class="row" dir="rtl">
            <div class="col-md-3">
                    <div class="card ">

                        <div class="content">
                            <div class="author text-center" >
                                <a href="#">
                                    <img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px" height="60px"/>

                                    <h4 class="title">راهنما<br />
                                        <small > فرم درخواست بورسیه</small>
                                    </h4>
                                </a>
                            </div>
                            <p class="description text-right">
                                <br>
                               دانش آموز گرامی شما می توانید درخواست بورسیه خود را به همراه توضیحات برای مشاوران ما ارسال نمایید . پس از بررسی اطلاعات شما و صحت آنها نتیجه درخواست در اسرع وقت به اطلاع شما خواهد رسید. بهره مندی از بورسیه امکانات متنوعی را در اختیار شما خواهد گذاشت.
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
        <div class="col-md-9">
            <div class="card text-right">
                <div class="header ">
                    <h4 class="title">بورسیه</h4>
                </div>
                <div class="content">
                    <form action="{{ route('student_dashboard_scholarship') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}





                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">







                                        <label>توضیحات درخواست*</label>
                                        <textarea dir="rtl" maxlength="500" name="stdMessage" tabindex="1" rows="5" class="form-control textarea-radius" placeholder="متن درخواست خود را وارد نمایید" {{ $scholarship && $scholarship->status!='NOT-SEEN'?'disabled':''}}>{{ $scholarship && !old('stdMessage') ? $scholarship->stdMessage : '' }}{{ old('stdMessage') ? old('stdMessage') : '' }}</textarea>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('stdMessage') }}{{ $errors->first('notComplete') }}</small>
                                        </div>
                                    </div>
                                    @if ($scholarship && $scholarship->status =='NOT-SEEN' || !$scholarship)
                                    <label>عکس کارنامه*</label>
                                    <div  class="col-md-12 " style="float: none;">

                                        <div class="file-upload">
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">{{ $scholarship ? 'ویرایش عکس کارنامه' : 'بارگذاری عکس کارنامه'}}</button>

                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" name="scholarshipImage" type='file' onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>همچنین میتوانید عکس کارنامه را بکشید و اینجا رهایش کنید.</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="عکس کارنامه" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()" class="remove-image">حذف <span class="image-title">عکس مورد نظر</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="file-return"></p>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('scholarshipImage') }}</small>
                                        </div>

                                    </div>
                                    @endif


                                @if($scholarship && $scholarship->status!='NOT-SEEN')
                                <div class="col-md-12">
                                    <div class="card text-right">
                                        <div class="header ">
                                            <h4 class="title">نتیجه درخواست</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> وضعیت : {{ $scholarship->persian_status }}</label>
                                                    </div>
                                                    <hr>
                                                    <div class="s-border">
                                                        <p id="admin-answer">
                                                            {{ $scholarship->adminMessage }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                    <button type="submit" class="btn btn-info btn-fill pull-left" {{ $scholarship && $scholarship->status!= 'NOT-SEEN' ? 'disabled' : ''}}>{{ $scholarship ? 'ویرایش درخواست' : 'ثبت درخواست' }}</button>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    @endif
@endsection
@section('script')
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
@endsection
