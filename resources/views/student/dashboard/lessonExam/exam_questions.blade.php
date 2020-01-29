@extends('layouts.student_exam')
@section('style')
<style>








img {
  display: block;
}

.gallery {
  position: relative;
  z-index: 2;
  padding: 10px;
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
  transition: all .5s ease-in-out;
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
}
.gallery.pop {
  -webkit-filter: blur(10px);
          filter: blur(10px);
}
.gallery figure {
  flex-basis: 33.333%;
  padding: 10px;
  overflow: hidden;
  cursor: pointer;
}
.gallery figure img {
  width: 100%;
  transition: all .3s ease-in-out;
}
.gallery figure figcaption {
  display: none;
}

.popup {
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: rgba(255,255,255,0.7);

  transition: opacity .5s ease-in-out .2s;
}
.popup.pop {
  opacity: 1;
  transition: opacity .2s ease-in-out 0s;
}
.popup.pop figure {
  margin-top: 0;
  opacity: 1;
}
.popup figure {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  margin-top: 30px;
  opacity: 0;
  -webkit-animation: poppy 500ms linear both;
          animation: poppy 500ms linear both;
}
.popup figure img {
  position: relative;
  z-index: 2;
    height: 500px!important;
    width: 500px!important;
}

.popup figure .shadow {
  position: relative;
  z-index: 1;
  top: -56px;
  margin: 0 auto;
  background-position: center bottom;
  background-repeat: no-repeat;
  width: 98%;
  height: 50px;
  opacity: .9;
  -webkit-filter: blur(16px) contrast(1.5);
          filter: blur(16px) contrast(1.5);
  -webkit-transform: scale(0.95, -0.7);
          transform: scale(0.95, -0.7);
  -webkit-transform-origin: center bottom;
          transform-origin: center bottom;
}
.popup .close {
  position: absolute;
  z-index: 3;
  top: 10px;
  right: 10px;
  width: 25px;
  height: 25px;
  cursor: pointer;
  background: url(#close);
  border-radius: 25px;
  background: rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
}
.popup .close svg {
  width: 100%;
  height: 100%;
}
@media (max-width:950px) and (min-width:600px){
.timer--clock{
    -webkit-box-align: center;
    -webkit-box-pack: center;
    display: -webkit-box;
    left:0% !important;
}
.timer--clock .clock-display-grp{
    width: 5em !important;
}
.timer--clock .clock-separator{
    float: none !important;
}
}
@media (max-width:600px) and (min-width:500px){
    .timer--clock{
        margin-left: 173px;
        left:0% !important;
    }
}
@media (max-width:500px) and (min-width:400px){
    .timer--clock{
        margin-left: 135px;
        left:0% !important;
    }
}
@media (max-width:400px){
    .timer--clock{
        margin-left: 81px;
        left:0% !important;
    }
}
.card-invs .card-examDn{
    padding: 0px !important;
}
</style>


@endsection
@section('content')



<form id="form" action="{{ route('student_dashboard_lessonExams_result',['exm' => $lessonExam->exm]) }}" method="POST">
{{ csrf_field() }}
<div class="card  card-invs">
            <div class="card-examDn">    
            

    
            <div class="timer timer-num2">
                    <div class="timer--clock">
                        <div class="minutes-group clock-display-grp">
                            <div class="first number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                            <div class="second number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                        </div>
                        <div class="clock-separator"><p>:</p></div>
                        <div class="seconds-group clock-display-grp">
                            <div class="first number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                            <div class="second number-grp">
                                <div class="number-grp-wrp">
                                    <div class="num num-0"><p>0</p></div>
                                    <div class="num num-1"><p>1</p></div>
                                    <div class="num num-2"><p>2</p></div>
                                    <div class="num num-3"><p>3</p></div>
                                    <div class="num num-4"><p>4</p></div>
                                    <div class="num num-5"><p>5</p></div>
                                    <div class="num num-6"><p>6</p></div>
                                    <div class="num num-7"><p>7</p></div>
                                    <div class="num num-8"><p>8</p></div>
                                    <div class="num num-9"><p>9</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

           

            </div>

</div>
{{-- modal-erea starts --}}

<div class="modal fade" id="end-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div dir="rtl" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">توجه!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
         <p>  در صورت انتخاب این گزینه آزمون شما اتمام یافته فرض می شود و دیگر قابل تکرار یا بازگشت نمی باشد.</p>
           <p> آیا مطمئن هستید؟</p>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                <button type="submit" class="btn btn-green">بله مطمئنم</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="perv-modal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div dir="rtl" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">توجه!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>  در صورت انتخاب این گزینه شما به صفحه ی آزمون های خود باز می گردید.  </p>
                <p> آیا مطمئن هستید؟</p>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                <a type="button" class="btn btn-secondary" href="{{ route('student_dashboard_purchasedExams') }}">بله مطمئنم</a>
            </div>
        </div>
    </div>
</div>

{{-- modal-erea ends --}}
@foreach ($lessonExam->questions as $key => $question )
@if($question->photo)


<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="card card-question">
            <div class="question-number">
                <h3 class="text-center question-number-text">{{ ++$key }}</h3>

            </div>
            <p dir="rtl" class="question-text">{{ $question->text }}</p>

        </div>

    </div>




    <div class="col-md-12" style="    margin: -63px 0px 0px 0px;    position: initial;">

        <div class="card card-question-content">
                <div class="col-md-12">

                    <p  class="question-notice text-right">:در صورت وجود عکس در این قسمت می توانید آن را مشاهده کنید</p>
                            <div class=" col-md-3 question-image ">
                            <figure class="">
                                    <img src="{{ $question->image }}" alt="" width="63px" height="82px"/>

                                  </figure>
</div>


                    <div class="col-md-2 mr-3" >
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
                                <symbol id="close" viewBox="0 0 18 18">
                                  <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
                                          S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
                                          l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
                                          c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
                                          s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
                                </symbol>
                              </svg>
                    </div>
                </div>


            <ul dir="rtl" class="question-answer-withaxe question-answer">
                <li>
                    <label  class="radio">
                        <input type="radio" name="questions[answer{{ $question->id }}]" value="1"   class="hidden"/>
                        <span class="label"></span>{{ $question->optionOne }}
                    </label>

                </li>
                <li>
                    <label  class="radio ">
                        <input type="radio" name="questions[answer{{ $question->id }}]" value="2"   class="hidden"/>
                        <span class="label"></span>{{ $question->optionTwo }}
                    </label>

                </li>
                <li>
                    <label  class="radio">
                        <input type="radio" name="questions[answer{{ $question->id }}]" value="3"  class="hidden"/>
                        <span class="label"></span>{{ $question->optionThree }}
                    </label>

                </li>
                <li>
                    <label  class="radio">
                        <input type="radio" name="questions[answer{{ $question->id }}]" value="4"   class="hidden"/>
                        <span class="label"></span>{{ $question->optionFour }}
                    </label>

                </li>

            </ul>

        </div>

    </div>
</div>
@else
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="card card-question">
            <div class="question-number">
                <h3 class="text-center question-number-text">{{ ++$key }}</h3>
            </div>
            <p dir="rtl" class="question-text">{{ $question->text }}</p>
        </div>

    </div>




    <div class="col-md-12" style="    margin: -63px 0px 0px 0px;    position: initial;">

        <div class="card card-question-content">


                <ul dir="rtl" class="question-answer-withoutaxe question-answer">
                    <li>
                        <label  class="radio">
                            <input type="radio" name="questions[answer{{ $question->id }}]" value="1"  class="hidden"/>
                            <span class="label"></span>{{ $question->optionOne }}
                        </label>

                    </li>
                    <li>
                        <label  class="radio ">
                            <input type="radio" name="questions[answer{{ $question->id }}]" value="2"  class="hidden"/>
                            <span class="label"></span>{{ $question->optionTwo }}
                        </label>

                    </li>
                    <li>
                        <label  class="radio">
                            <input type="radio" name="questions[answer{{ $question->id }}]" value="3"   class="hidden"/>
                            <span class="label"></span>{{ $question->optionThree }}
                        </label>

                    </li>
                    <li>
                        <label  class="radio">
                            <input type="radio" name="questions[answer{{ $question->id }}]" value="4"   class="hidden"/>
                            <span class="label"></span>{{ $question->optionFour }}
                        </label>

                    </li>

                </ul>

        </div>

    </div>
</div>

@endif

@endforeach
<div class="card">
            <div class="card-examDn">    
            <button class="button-perv" data-toggle="modal" data-target="#perv-modal"  >بازگشت</button>


            


            <button  class="button-end" data-toggle="modal" data-target="#end-modal"  >اتمام</button>

            </div>
                
</div>

</div>

</form>
@endsection





