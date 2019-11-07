@extends('layouts.content')
@section('style')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/details.css') }}">
@endsection
@section('content')



<div class="back-bg" style="background-image:url({{asset('image/student/auth/auth.jpg')}})">

<div class="row"><h3 class="exam-title" dir="rtl">ازمون شماره 1</h3></div>
    <div class="container">
        <div class="jumbotron" dir="rtl">
            
                <div class="row">
                    <div class="col-12">
                        <ul class="header">
                <li class="header-item-title">آمار</li>
                <li class="header-item" dir="ltr">
                        <i class="fas fa-calendar-week"></i>
                    1398/3/23</li>
                    
                </ul>
                </div>
                </div>
                <hr>
                <div class="row">

                <ul class="lead">
                    <div class="payeh">
                    <li class="payeh-fitst-item">پایه:</li>
                    <li>یادزهم</li>
                </div>
                <div class="gerayesh">
                    <li class="gerayesh-first-item">گرایش:</li>
                    <li>ریاضی</li>
                </div>
                </ul>
            </div>
               
                <div class="row">

                        <ul class="lead">
                                <div class="payeh">
                                <li class="payeh-fitst-item">تعداد سوالات:</li>
                                <li>30</li>
                            </div>
                            <div class="gerayesh">
                                <li class="gerayesh-first-item">زمان:</li>
                                <li>30</li>
                            </div>
                            </ul>

                </div>
                <h3 class="description-title">
                    توضیحات:
                </h3>
                 <p class="description-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.                     </p>

                        <div class="row">

                                <ul class="lead">
                                        <div class="payeh">
                                        <li class="payeh-fitst-item">قیمت:</li>
                                        
                                    </div>
                                    <div class="gerayesh">
                                        <li class="gerayesh-first-item">ریال:</li>
                                        <li>300000000000</li>
                                    </div>
                                    </ul>
        
                        </div>
                        <div class="shop-icon" dir="ltr">
                            <a href="#">

                        <i class="fas fa-cart-arrow-down"></i>
                            </a>
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




</script>
@endsection

