@extends('layouts.student_dashboard')

@section('link')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="stylesheet" href="{{ asset('css/student/dashboard/exam-questions.css') }}">

@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h3>این قسمت مربوط به توضیحات ازمون می باشد</h3>
        </div>
    </div>
    <hr>

    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
             aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
    </div>

    <form action="{{route('student_dashboard_lessonExams_questionsCorrect')}}" method="post">

        {{csrf_field()}}

        <div style="display: none">
            {{$i=0}}
        </div>

        @foreach($questions as $question)

            <in class="list-group list-group-flush">
                <li class="list-group-item active">
                    <p>{{$question->text}}</p>
                </li>

                <div style="display: none">
                    {{$i++}}
                </div>

                <input name="{{'questions[' . $i . '][id]' }}" value="{{$question->id}}" type="text"
                       style="display: none">

                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio1' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="1"
                               type="radio"/>
                        <label for="{{'radio1' . $question->id}}">{{$question->optionOne}}</label>
                    </div>
                </li>


                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio2' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="2"
                               type="radio"/>
                        <label for="{{'radio2' . $question->id}}">{{$question->optionTwo}}</label>
                    </div>
                </li>


                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio3' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="3"
                               type="radio"/>
                        <label for="{{'radio3' . $question->id}}">{{$question->optionThree}}</label>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio4' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="4"
                               type="radio"/>
                        <label for="{{'radio4' . $question->id}}">{{$question->optionFour}}</label>
                    </div>
                </li>

            </in>

        @endforeach

        <button type="submit" class="btn btn-info btn-fill pull-right">اتمام</button>
        <div class="clearfix"></div>

    </form>

@endsection


@section('script')
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script type="text/javascript">
TweenLite.defaultEase = Expo.easeOut;
var time = "{{ $lessonExam->remainingTime() }}";
initTimer(time); // other ways --> "0:15" "03:5" "5:2"

var reloadBtn = document.querySelector('.reload');
var timerEl = document.querySelector('.timer');
var col=document.querySelector('col-12');

function initTimer (t) {

   var self = this,
       timerEl = document.querySelector('.timer'),
       minutesGroupEl = timerEl.querySelector('.minutes-group'),
       secondsGroupEl = timerEl.querySelector('.seconds-group'),

       minutesGroup = {
          firstNum: minutesGroupEl.querySelector('.first'),
          secondNum: minutesGroupEl.querySelector('.second')
       },

       secondsGroup = {
          firstNum: secondsGroupEl.querySelector('.first'),
          secondNum: secondsGroupEl.querySelector('.second')
       };

   var time = {
      min: t.split(':')[0],
      sec: t.split(':')[1]
   };

   var timeNumbers;

   function updateTimer() {

      var timestr;
      var date = new Date();

      date.setHours(0);
      date.setMinutes(time.min);
      date.setSeconds(time.sec);

      var newDate = new Date(date.valueOf() - 1000);
      var temp = newDate.toTimeString().split(" ");
      var tempsplit = temp[0].split(':');

      time.min = tempsplit[1];
      time.sec = tempsplit[2];

      timestr = time.min + time.sec;
      timeNumbers = timestr.split('');
      updateTimerDisplay(timeNumbers);

      if(timestr === '0000')
         countdownFinished();

      if(timestr != '0000')
         setTimeout(updateTimer, 1000);

   }

   function updateTimerDisplay(arr) {

      animateNum(minutesGroup.firstNum, arr[0]);
      animateNum(minutesGroup.secondNum, arr[1]);
      animateNum(secondsGroup.firstNum, arr[2]);
      animateNum(secondsGroup.secondNum, arr[3]);

   }

   function animateNum (group, arrayValue) {

      TweenMax.killTweensOf(group.querySelector('.number-grp-wrp'));
      TweenMax.to(group.querySelector('.number-grp-wrp'), 1, {
         y: - group.querySelector('.num-' + arrayValue).offsetTop
      });

   }

   setTimeout(updateTimer, 1000);

}

function countdownFinished() {
   setTimeout(function () {
      TweenMax.set(reloadBtn, { scale: 0.8, display: 'block' });
      TweenMax.to(timerEl, 1, { opacity: 0.2 });
      TweenMax.to(reloadBtn, 0.5, { scale: 1, opacity: 1 });
      TweenMax.to(".list-group-item", .3, {
      opacity: 0,

    });
   }, 1000);
   document.getElementById('form').submit();
}


@endsection


