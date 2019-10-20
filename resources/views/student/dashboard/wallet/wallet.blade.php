@extends('layouts.student_dashboard')
@section('content')

<style>

.errors-bg{

    margin: 10px 0;
  padding: 10px;
  border-radius: 3px 3px 3px 3px;
  color: #D8000C;
  background-color: #FFBABA;
  font-size: large
} 

.success{
    margin: 10px 0;
    padding: 8px 12px 4px;
  border-radius: 3px 3px 3px 3px;
  color: #270;
  background-color: #DFF2BF;
  font-size: large
}

</style>
<div class="row" dir="rtl">
        <div class="col-md-3">
                <div class="card ">
                    <div class="content">
                        <div class="author text-center" >
                            <a>
                                <img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px" height="60px"/>

                                <h4 class="title">راهنما<br />
                                    <small >شارژ کیف پول</small>
                                </h4>
                            </a>
                        </div>
                        <p class="description text-right">
                            <br>
                        دانش آموز گرامی در صورتی که دارای کد شگفت انگیز هستید می توانید از آن استفاده کرده و به اندازه درصد کد روی مبلغ وارد شده ، شارژ بیشتری دریافت نمایید .
                        </p>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-9">
                <div class="card text-right">
                    <div class="header ">
                        <h4 class="title">کیف پول</h4>
                        <label>مبلغ کیف پول شما : {{ $student->wallet }} تومان</label>
                    </div>
                    <div class="content ">

                        <div class="content ">

                            <form action="{{ route('student_wallet_charge') }}" method="POST" class="needs-validation" novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>مبلغ شارژ (تومان)</label>
                                                <input dir="rtl" type="text" name="charge_value" class="form-control"
                                                       placeholder="مبلغ شارژ را وارد نمایید"
                                                       value="{{ old('charge_value')}}">
                                                <div class="invalid-feedback">
                                                            <small>{{ $errors->first('charge_value') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>کد شگفت انگیز</label>
                                            <input dir="rtl" type="text" name="charge_code" class="form-control"
                                                   placeholder="کد شگفت انگیز را وارد نمایید"
                                                   value="{{ old('charge_code')}}">
                                            <div class="invalid-feedback">
                                                        <small>{{ $errors->first('charge_code') }}</small>
                                            </div>
                                        </div>
                                    </div>
    
                            </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">ورود به درگاه</button>
                                <div class="clearfix"></div>

                                {{-- {{ $errors->first('chargeFailed') }} --}}
                                <div class="errors-bg"> 
                                        <i class="fas fa-times"></i>
                                    غیر موفقیت امیز</div>
                             
                                    {{-- {{ $errors->first('transactionFailed') }} --}}
                                <div class="success">
                                        <i class="fas fa-check"></i>
                                    موفقیت امیز
                                
                                </div>
                                @if(Session::get('status'))
                                <div>{{ Session('status')}}</div>
                                @endif
                                @if(Session::get('discount'))
                                <div>{{ Session('discount')}}</div>
                                @endif
                            </form>
                        </div>
                       </div>
                        </div>
                    </div>

                </div>

@section('script')

@endsection

@endsection

