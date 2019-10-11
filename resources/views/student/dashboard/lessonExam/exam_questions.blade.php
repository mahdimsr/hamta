@extends('layouts.student_dashboard')





@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link rel="stylesheet" href="{{ asset('css/student/dashboard/exam-questions.css') }}">

















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


<div class="gallery">
  <figure>
    <img src="{{asset('image/homepage/city_of_love-wallpaper-3554x1999.jpg')}}" alt="" />
 
  </figure>

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


