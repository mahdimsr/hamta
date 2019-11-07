@extends('layouts.content')
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
                                        <textarea dir="rtl" maxlength="500" name="stdMessage" tabindex="1" rows="5" class="form-control textarea-radius" placeholder="متن درخواست خود را وارد نمایید" {{ $scholarship && $scholarship->status!='NOT-SEEN'?'disabled':''}}>{{ $scholarship && !old('stdMessage') ? $scholarship->stdMessage : '' }}{{ old('stdMessage') ? old('stdMessage') : '' }}</textarea>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('stdMessage') }}{{ $errors->first('notComplete') }}</small>
                                        </div>
                                    </div>
                                    @if ($scholarship && $scholarship->status =='NOT-SEEN' || !$scholarship)
                                    <label>عکس کارنامه</label>
                                    <div  class="col-md-5 " style="float: none;">
                                        <div class="input-file-container">
                                            <input class="input-file" id="my-file" type="file" name="scholarshipImage">
                                            <label tabindex="2" for="my-file" class="input-file-trigger text-center">{{ $scholarship ? 'به روز رسانی عکس کارنامه' :'آپلود عکس کارنامه' }}</label>
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
@endsection

