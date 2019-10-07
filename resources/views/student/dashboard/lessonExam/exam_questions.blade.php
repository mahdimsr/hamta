@extends('layouts.student_dashboard')





@section('content')

<link rel="stylesheet" href="{{ asset('css/student/dashboard/exam-questions.css') }}">


<div dir="rtl" class="row">
    <div class="col-md-1">
        <label class="label" style="font-size: 130%">
            <input name="questionId[]" value="" id="question-check" onchange="sina()"

                   class="label__checkbox" type="checkbox"/>
            <span class="label__text">
                  <span class="label__check">
                        <i class="fa fa-check icon"></i>
                </span>
            </span>
        </label>
    </div>

    <div class="col-md-11">
        <div class="card cards">

                <div class="card-header" id="correct-item1">این سوال است ببینید این سوال است ببینید این سوال است ببینید</div>

            <div class="card-body">

                <div dir="rtl" class="row text-right " style="margin: 0px;">
                    <div class="col-md-9 col-lg-10" style="float: right">


                        <ul class="answers">
                            <li class="list-li"><p>گزینه است </p></li>
                            <li class="list-li"><p> گزینه است </p></li>
                            <li class="list-li"><p>گزینه است </p></li>
                            <li class="list-li"><p>گزینه است </p></li>
                        </ul>

                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-2" style="float: right;">
                        <a href="#"> <img class="question-img  imgs"
                                          src="{{asset('image/admin/dashboard/test.png')}}"
                                          width="120px" height="100px"></a>
                    </div>


                </div>

            </div>
            <div class="card-footer text-muted text-center" id="correct-item2">
                <p>مقطع: سوم ، سطح سختی: آسان</p>
            </div>
        </div>
    </div>

</div>
<div class="row">
        <div class="col-12">
            <h3>این قسمت مربوط به توضیحات ازمون می باشد</h3>
        </div>
    </div>
<hr>

<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
</div>

<ul class="list-group list-group-flush">
<li class="list-group-item active">



<p>ایا رسیدن به سرعت مجاز است؟ -1</p>
</li>









<li class="list-group-item">


  <div class="inputGroup">
    <input id="radio1" name="radio" type="radio"/>
    <label for="radio1">گزینه اول می باشد</label>
  </div>
</li>






<li class="list-group-item">

<div class="inputGroup">
    <input id="radio2" name="radio" type="radio"/>
    <label for="radio2">گزینه دوم</label>
  </div>
</li>






<li class="list-group-item">







<div class="inputGroup">
    <input id="radio3" name="radio" type="radio"/>
    <label for="radio3">گزینه سوم می باشد</label>
  </div>


</li>
<li class="list-group-item">




<div class="inputGroup">
    <input id="radio4" name="radio" type="radio"/>
    <label for="radio4">گزینه چهارم می باشد</label>
  </div>



</li>
</ul>















<ul class="list-group list-group-flush">
<li class="list-group-item active">



<p>ایا رسیدن به سرعت مجاز است؟ -1</p>



<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('image/homepage/city_of_love-wallpaper-3554x1999.jpg')}}" alt="Card image cap">

</div>
</li>









<li class="list-group-item">


  <div class="inputGroup">
    <input id="radio5" name="q" type="radio"/>
    <label for="radio5">گزینه اول می باشد</label>
  </div>
</li>






<li class="list-group-item">

<div class="inputGroup">
    <input id="radio6" name="q" type="radio"/>
    <label for="radio6">گزینه دوم</label>
  </div>
</li>






<li class="list-group-item">







<div class="inputGroup">
    <input id="radio7" name="q" type="radio"/>
    <label for="radio7">گزینه سوم می باشد</label>
  </div>


</li>
<li class="list-group-item">




<div class="inputGroup">
    <input id="radio8" name="q" type="radio"/>
    <label for="radio8">گزینه چهارم می باشد</label>
  </div>



</li>
</ul>















@endsection


@section('script')
@endsection


