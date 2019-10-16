@extends('layouts.student_dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/showResult.css') }}">
<div class="container">   
<div class="row" dir="rtl">

        <h1>صفحه نتایج</h1>

    </div>
  
        <div id="time" dir="rtl">
            <h5 class="time-header">نشان دادن زمان ازمون</h5>
        </div>
        <hr>
        <div class="card" dir="rtl">
                <div class="card-header">
                  توضیحات ازمون
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">تعداد سوالات :<span>656</span></li>
                  <li class="list-group-item">تعداد غلط <span>656</span></li>
                  <li class="list-group-item">تعداد درست <span>656</span></li>
                  <li class="list-group-item">دانلود فایل سوال ها <span>656</span></li>
                  <li class="list-group-item">کارنامه <span>656</span></li>
                </ul>
              </div>



    </div>
<script>

var granimInstance = new Granim({
    element: '.card-header',
    direction: 'left-right',
    isPausedWhenNotInView: true,
    states : {
        "default-state": {
            gradients: [
                ['#ff9966', '#ff5e62'],
                ['#00F260', '#0575E6'],
                ['#e1eec3', '#f05053']
            ]
        }
    }
});
</script>
@endsection

