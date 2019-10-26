@extends('layouts.student_dashboard')
@section('style')
    <style>
        @media (min-width:992px){.s-floatL{float:left!important;}.s-floatR{float: right!important;}}
    </style>
    @endsection
@section('content')

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







                                        <label>توضیحات درخواست</label>
                                        <textarea dir="rtl" maxlength="500" name="stdMessage" tabindex="1" rows="5" class="form-control textarea-radius" placeholder="متن درخواست خود را وارد نمایید" @unless(empty($scholarship)) {{ $scholarship->status!='NOT-SEEN' ? 'disabled' : '' }} @endunless>@unless(empty($scholarship)){{ $scholarship->status && !old('stdMessage') ? $scholarship->stdMessage : '' }}@endunless{{ old('stdMessage') ? old('stdMessage') : '' }}</textarea>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('stdMessage') }}{{ $errors->first('notComplete') }}</small>
                                        </div>
                                    </div>
                                    @unless (!empty($scholarship->adminMessage))
                                    <label>عکس کارنامه</label>
                                    <div  class="col-md-5 " style="float: none;">
                                        <div class="input-file-container">
                                            <input class="input-file" id="my-file" type="file" name="scholarshipImage">
                                            <label tabindex="2" for="my-file" class="input-file-trigger text-center">عکس کارنامه را آپلود نمایید</label>
                                        </div>
                                        <p class="file-return"></p>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('scholarshipImage') }}</small>
                                        </div>

                                    </div>
                                    @endunless


                                @unless(empty($scholarship->adminMessage))
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
                                @endunless

                                @if(empty($scholarship))
                                    <button type="submit" class="btn btn-info btn-fill pull-right">ثبت درخواست</button>
                                @endif

                                @if (!empty($scholarship))
                                    @if ($scholarship->status=='NOT-SEEN')
                                        <button type="submit" class="btn btn-info btn-fill pull-right">ویرایش درخواست</button>
                                    @endif
                                @endif

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

