@extends('layouts.content')
@section('style')
<link rel="stylesheet" href="{{ asset('css\student\dashboard\transaction.css') }}">
@endsection
@section('content')

<section class="pink-bg">
    <h4 class="pink-title">لیست پرداختی</h4>
<img class="fisrt-jpg" src="{{ asset('image/student/dashboard/37375-blue-triangle-rounded-corners-icon.png') }}" alt="">

</section>
<section class="factor">
<h4 dir="rtl">فاکتورها</h4>

<div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
</section>


@endsection
