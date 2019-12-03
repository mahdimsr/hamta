@extends('layouts.student_dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/details.css') }}">
@endsection
@section('content')



<div class="back-bg" style="background-image:url({{asset('image/student/auth/auth.jpg')}})">

<div class="row"><h3 class="exam-title" dir="rtl">{{ $lessonExam->title }}</h3></div>
    <div class="container">
        <div class="jumbotron" dir="rtl">

                <div class="row">
                    <div class="col-12">
                        <ul class="header">
                <li class="header-item-title">
                    @foreach($lessonExam->lessons() as $lesson)
                    {{$lesson->title}}
                    @endforeach
                </li>
                <li class="header-item" dir="ltr">
                        <i class="fas fa-calendar-week"></i>
                    {{ $lessonExam->active }}</li>

                </ul>
                </div>
                </div>
                <hr>
                <div class="row">

                <ul class="lead">
                    <div class="payeh">
                    <li class="payeh-fitst-item">پایه :</li>
                    <li>{{ $lessonExam->grade()->title }}</li>
                </div>
                <div class="gerayesh">
                    <li class="gerayesh-first-item">گرایش :</li>
                    <li>{{ $lessonExam->orientation()->title }}</li>
                </div>
                </ul>
            </div>

                <div class="row">

                        <ul class="lead">
                                <div class="payeh">
                                <li class="payeh-fitst-item">تعداد سوالات :</li>
                                <li>{{ count($lessonExam->questionExams) }}</li>
                            </div>
                            <div class="gerayesh">
                                <li class="gerayesh-first-item">زمان :</li>
                                <li>{{ $lessonExam->duration }} دقیقه</li>
                            </div>
                            </ul>

                </div>
                <h3 class="description-title">
                    توضیحات :
                </h3>
                 <p class="description-body">
                    {{ $lessonExam->description ? $lessonExam->description : 'بدون توضیحات' }}
                </p>

                        <div class="row">

                                <ul class="lead">
                                        <div class="payeh">
                                        <li class="payeh-fitst-item">قیمت :</li>

                                    </div>
                                    <div class="gerayesh">

                                        <li>{{ number_format($lessonExam->price) }}</li>
                                        <li class="gerayesh-first-item" style="margin-right: 5px">تومان</li>
                                    </div>
                                    </ul>

                        </div>
                        <div class="shop-icon" dir="ltr">
                            @if($lessonExam->hasInCart())
                            <a class="add-to-cart">موجود در سبد خرید</a>
                            @elseif($lessonExam->hasPurchased())
                            <a href="{{ route('student_dashboard_lessonExams_questions',['exm'=> $lessonExam->exm]) }}" class="add-to-cart">شرکت در آزمون</a>
                            @else
                                <a href="{{ route('student_dashboard_lessonExams_addToCart',['exm'=> $lessonExam->exm]) }} " class="add-to-cart"><span class="fa fa-cart-plus"></span>اضافه شدن به سبد خرید</a>
                            @endif
                        </div>

              </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>

<script >
const back_bg= document.querySelector(".back-bg");
const jumbotron= document.querySelector(".jumbotron");
const description_body= document.querySelector(".description-body");




const tl = new TimelineMax();
tl.fromTo(back_bg,1,{height: "0%"},{height: "80%" , ease: Power2.easeInOut})
.fromTo(
    back_bg,
    1.2,
    {width : "80%"},
    {width:"96%" , ease: Power2.easeInOut}
)
.fromTo(jumbotron, 1, {opacity:0},{opacity: 1},"-=0.7")

// $(document).ready(function() {
// 	var count = 0;
// 	$("a.add-to-cart").click(function(event) {
// 		count++;
// 		$("a.add-to-cart").addClass("size");
// 		setTimeout(function() {
// 			$("a.add-to-cart").addClass("hover");
// 		}, 200);
// 		setTimeout(function() {
// 			$("a.cart > span").addClass("counter");
// 			$("a.cart > span.counter").text(count);
// 		}, 400);
// 		setTimeout(function() {
// 			$("a.add-to-cart").removeClass("hover");
// 			$("a.add-to-cart").removeClass("size");
// 		}, 600);
// 		event.preventDefault();
// 	});
// });


</script>
@endsection

