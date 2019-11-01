
 <!DOCTYPE html>
 <html lang="fa">
 <head>
   <meta charset="utf-8">

   <title>کد اینترنتی</title>



     <link type="text/css" href="{{asset('css/student/verify/style.css')}}" rel="stylesheet">

  
   <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
   <link href="{{asset('css/student/auth/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('css/student/auth/mdb.min.css')}}" rel="stylesheet">
   <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" /> 
   <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>

 <body class="back-bg">
 <!-- Matomo -->

 <!-- End Matomo Code -->
 <div id='placeholder'>

         <div class="container">
   <div class="jumbotron">
     <div class="inner-container">
       <a href="#" class="back-link-arrow">
          <i class="fas fa-arrow-left"></i>
       </a>
 
       <div class="inner-container-header">
         <img class="imglogos" src={{asset('image/student/auth/اصلی.png')}}
              height="80" width="80">
      
       </div>

       <div class="inside-jumbotron">

         <!-- Form  -->
         <form>

           <div class="inner-container-body">
             <button type="submit" name="#" value="#" style="display: none">
             </button>



               <h5 class="otptitle"> لطفا رمز خود را وارد کنید.</h5>

             <!-- Change Username  -->
       

             <!-- Insert OTP -->

               <input maxlength="5" id="otpinput" type="number" required="" min="0" inputmode="numeric" pattern="[0-9]"
                      placeholder="XXXXXXX" autocomplete="off" name="#" minlength="0"
                      onkeypress="javascript:return isNumber(event)"
                      title='لطفا عدد وارد کنید' autofocus/>


             <div dir="rtl" class="alert-container center">
               <div class="loginerror-container">

                 <div dir="rtl" class="loginerror"></div>
               </div>
             </div>

           </div>
           <!-- Login Button -->
           <div class="timer">
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
            <div class="reload">
 
               <button class="btn btn-default btn-warning btn-next">
                  ارسال دوباره رمز
               </button>
          
            </div>
           <div class="inner-container-footer">
             <button type="submit" name="#" value="#"
                     class="btn btn-default btn-big btn-warning btn-next">
               ادامه
             </button>

             <!-- Resend Button -->

               <div id="countdown-number" style="display: none"></div>
               <div class="btn-resend-container">
                 <div class="wrapper" title='لطفا برای ارسال مجدد صبر کنید'>

                 </div>



               </div>

               <button type="submit" name="#" value="#"
                       class="btn btn-link btn-key">
                 ورود با رمز عبور
               </button>


               </div>



         </form>

       </div>
     </div>
   </div>










 </div>

 </div>

  </div>

 </body>
 <script src="{{asset('js/student/auth/jquery-3.4.1.min.js')}}"></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script> 
 <script>




function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    } 


document.addEventListener("DOMContentLoaded", function () {
  var elements = document.getElementsByTagName("INPUT");
  for (var i = 0; i < elements.length; i++) {
      elements[i].oninvalid = function (e) {
          e.target.setCustomValidity("");
          if (!e.target.validity.valid) {
              e.target.setCustomValidity("لطفا این بخش را پر کنید");
          }
      };
      elements[i].oninput = function (e) {
          e.target.setCustomValidity("");
      };
  }
});
$("#otpinput").val('');
  $("#otpinput").focus();






  $(function(){
        var maxLength=5;
        var show = false;

        $('#otpinput').keyup(function(){
            var textArea=$(this);
            var len=textArea.val().length;
            if(len>=0 && show==false){
                show=true;
                $('#charNum').css('visibility','visible');
                $('#char_left').css('visibility','visible');
            }
            if(len<=maxLength){
                $('#charNum').text(maxLength-len);

            }
            else{
                textArea.val(textArea.val().substring(0,maxLength));
                alert('کد وارد شده باید پنج رقم باشد');
            }
        });


        });
        TweenLite.defaultEase = Expo.easeOut;

initTimer("00:05"); // other ways --> "0:15" "03:5" "5:2"

var reloadBtn = document.querySelector('.reload');
var timerEl = document.querySelector('.timer');

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
   }, 1000);
}

reloadBtn.addEventListener('click', function () {
   TweenMax.to(this, 0.5, { opacity: 0, onComplete:
      function () { 
         reloadBtn.style.display= "none";
      } 
   });
   TweenMax.to(timerEl, 1, { opacity: 1 });
   initTimer("00:05");
});
</script>
 </html>
