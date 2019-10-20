@extends('layouts.student_dashboard')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<style>

@media (min-width: 992px){
.col-md-9 {
    width: 75%;
    position: absolute;
    top: 12%;
    left: 24%;
}
}
 ul{
    list-style: none;
   
}
ul.errors-list{
   
 
    position: relative;
    top: 99%;
    right: 4%;
}
.errors-bg{

    background-color: #fce4e4;
    border: 1px solid #fcc2c3;
    border-radius: 7px;
    -moz-border-radius: 7px;
    -webkit-border-radius: 7px;
    display: inline;
    color: #cc0033;
    float: left;
    margin: 5rem 0rem 2rem 0rem;
    font-weight: bold;
    line-height: 24px;
    position: absolute;
    padding: 8px 12px 4px;
    /* top: 11%; */
    /* bottom: -26%; */
    margin-left: 11px;
}


 .wallet-errors-name{
    background-color: #fce4e4;
  border: 1px solid #fcc2c3;
  border-radius: 7px;
  -moz-border-radius: 7px;
  -webkit-border-radius: 7px;
  display: inline;
  color: #cc0033;
  float: right;
  width: 19%;
  margin-top: 2px;
  font-weight: bold;
  line-height: 24px;
  position: relative;
  padding: 7px 11px 4px;
  margin-left: 17px;
} 






/* .wallet-errors-name:after, .wallet-errors-name:before {
    content: '';
    border: 7px solid transparent;
    position: absolute;
    top: 11px;
  }
  .wallet-errors-name:after {
    border-right: 7px solid #fce4e4;
    left: -14px;
  }
  .wallet-errors-name:before {
    border-right: 7px solid #fcc2c3;
    left: -15px;
  } */
.fas.fa-exclamation{
    position: relative;
float: right;
margin-top: 6%;
margin-left: 6%;
}
#justformargin{
   
    margin-top: -6px;
}
</style>
<div class="row" dir="rtl">
        <div class="col-md-3">
                <div class="card ">
        
                    <div class="content">
                        <div class="author text-center" >
                            <a href="#">
                                <img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px" height="60px"/>
        
                                <h4 class="title">راهنما<br />
                                    <small >راهنمای کد شگفت انگیز</small>
                                </h4>
                            </a>
                        </div>
                        <p class="description text-right">
                            <br>
                            توصیحات کد شگفت انگیز که هیچ ایده ای درباره این کده ندارم 
                        </p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-9">
<div class="card text-right">
    <div class="header ">
        <h4 class="title">کیف پول</h4>
        <label>مبلغ کیف پول شما : {{ $student->wallet/10 }} تومان</label>
    </div>
    <div class="content ">
        
        <form action="{{ route('student_wallet_charge') }}" method="POST" class="needs-validation" novalidate>
            {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>مبلغ شارژ (تومان)</label>
                            <input dir="rtl" type="text" name="price" class="form-control"
                                   placeholder="مبلغ شارژ را وارد نمایید"
                                   value="{{ old('price')}}">
                            <div class="invalid-feedback">
                                  
                                <small class="wallet-errors-name">
                                    
                                        <i class="fas fa-exclamation"></i> 
                                        {{ $errors->first('price') }}
                                </small>
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
                               <p></p>
                        <div class="invalid-feedback">
                            <small class="wallet-errors-name" id="justformargin">
                                     <i class="fas fa-exclamation"></i>
                                
                                    {{ $errors->first('code') }}
                            
                            </small>
                        </div>
                    </div>
                </div>

        </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">ورود به درگاه</button>
            <div class="row">
            <div class="errors-bg"> 
            <ul class="errors-list">
           
            <li>{{ $errors->first('codeExpired') }}</li>
            <li>{{ $errors->first('codeIncorrect') }}</li>
            <li>{{ $errors->first('chargeFailed') }}</li>
            <li>{{ $errors->first('transactionFailed') }}</li>
            @if(Session::get('status'))
            <li>{{ Session('status')}}</li>
            @endif
            @if(Session::get('discount'))
            <li>{{ Session('discount')}}</li>
            @endif
            </ul>
            </div>
            </div>
            
        </form>
    </div>
</div>
        </div>



@section('script')
<script src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
<script>
var cleave = new Cleave('.input-element', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
$( ".form-control" )
 .keyup(function() {
    var value = $( this ).val();
    var va = value.toString();
   $( ".input-element" ).val( va );
  })
   .keyup();
</script>

@endsection

@endsection

