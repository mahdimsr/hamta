@extends('layouts.student_dashboard')
@section('content')
<div class="card text-right">
    <div class="header ">
        <h4 class="title">کیف پول</h4>
        <label>مبلغ کیف پول شما : {{ $student->wallet/10 }} تومان</label>
    </div>
    <div class="content">
        <form action="{{ route('student_wallet_charge') }}" method="POST" class="needs-validation" novalidate>
            {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>مبلغ شارژ (ریال)</label>
                            <input dir="rtl" type="text" name="price" class="form-control
                            input-numeral"
                                   placeholder="مبلغ شارژ را وارد نمایید"
                                   value="{{ old('price')}}">
                            <div class="invalid-feedback">
                                <small>{{ $errors->first('price') }}</small>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>کد شگفت انگیز</label>
                        <input dir="rtl" type="text" name="code" class="form-control"
                          
                               placeholder="کد شگفت انگیز را وارد نمایید"
                               value="{{ old('code')}}">
                        <div class="invalid-feedback">
                            <small>{{ $errors->first('code') }}</small>
                        </div>
                    </div>
                </div>

        </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">ورود به درگاه</button>
            <div>{{ $errors->first('codeExpired') }}</div>
            <div>{{ $errors->first('codeIncorrect') }}</div>
            <div>{{ $errors->first('chargeFailed') }}</div>
            <div>{{ $errors->first('transactionFailed') }}</div>
            @if(Session::get('status'))
            <div>{{ Session('status')}}</div>
            @endif
            @if(Session::get('discount'))
            <div>{{ Session('discount')}}</div>
            @endif
            <div class="clearfix"></div>
        </form>
    </div>
</div>

@section('script')
<script src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
<script>
var cleaveNumeral = new Cleave('.input-numeral', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});


</script>

@endsection

@endsection

