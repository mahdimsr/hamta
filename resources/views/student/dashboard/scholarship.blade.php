@extends('layouts.student_dashboard')
@section('content')

<div class="row" dir="rtl">
    <div class="col-md-12">
        <div class="card ">

            <div class="content">
                <div class="author" >
                    <a href="#">
                        <img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px" height="60px"/>

                        <h4 class="title">راهنما<br />
                            <small> فرم درخواست بورسیه</small>
                        </h4>
                    </a>
                </div>
                <p class="description text-center">
                    <br>
                    دانش آموز گرامی شما در این بخش می توانید درخواست بورسیه را برای مشاوران ما ارسال کنید. درخواست شما پس از بررسی مشاوران سایت در اسرع وقت پاسخ داده خواهد شد.
                </p>
            </div>
            <hr>
            <div class="text-center">


            </div>
        </div>
    </div>
    </div>
    <div class="row" dir="rtl">
        <div class="col-md-12">
            <div class="card text-right">
                <div class="header ">
                    <h4 class="title">بورسیه</h4>
                </div>
                <div class="content">
                    <form action="{{ route('student_dashboard_scholarship_submit') }}" method="POST" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <p>توضیحات مربوط به درخواست</p>
                                        <hr>
                                        <label>توضیحات درخواست</label>
                                        <textarea dir="rtl" name="stdMessage" rows="5" class="form-control textarea-radius" placeholder="متن درخواست خود را وارد نمایید" required @unless(empty($scholarship)) {{ $scholarship->status!='NOT-SEEN' ? 'disabled' : '' }} @endunless>@unless(empty($scholarship)){{ $scholarship->status && !old('stdMessage') ? $scholarship->stdMessage : '' }}@endunless{{ old('stdMessage') ? old('stdMessage') : '' }}</textarea>

                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('stdMessage') }}</small>
                                        </div>
                                    </div>
                                </div>

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
                            <label>.دانش آموز گرامی با سلام</label>
                        </div>
                        <p>{{ $scholarship->adminMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endunless
@endsection

