@extends('layouts.student_dashboard')
@section('content')

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
                                        <textarea dir="rtl" name="stdMessage" rows="5" class="form-control" placeholder="متن درخواست خود را وارد نمایید" required @unless(empty($scholarship)) {{ $scholarship->status!='NOT-SEEN' ? 'disabled' : '' }} @endunless>@unless(empty($scholarship)){{ $scholarship->status && !old('stdMessage') ? $scholarship->stdMessage : '' }}@endunless{{ old('stdMessage') ? old('stdMessage') : '' }}</textarea>
                                        <small>{{ $errors->first('stdMessage') }}</small>
                                        <div class="invalid-feedback">

                                        </div>
                                        <p style="padding:30px;">نتیجه درخواست : @unless(empty($scholarship)){{ $scholarship->adminMessage }}@endunless</p>
                                    </div>
                                </div>

                                @if(empty($scholarship))
                                    <button type="submit" class="btn btn-info btn-fill pull-right">ثبت درخواست</button>
                                @endif

                                @if (!empty($scholarship))
                                    @if ($scholarship->status=='NOT-SEEN')
                                        <button type="submit" class="btn btn-info btn-fill pull-right">ثبت درخواست</button>
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

