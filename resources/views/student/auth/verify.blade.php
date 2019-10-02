
 <!DOCTYPE html>
 <html lang="fa">
 <head>
   <meta charset="utf-8">

   <title>کد اینترنتی</title>


   
     <link type="text/css" href="{{asset('css/student/verify/style.css')}}" rel="stylesheet">
   
   <script src="{{asset('js/student/auth/jquery-3.4.1.min.js')}}"></script>
   <link rel='stylesheet' type='text/css' media='screen' href="{{asset('fonts/font.css')}}">
   <link href="{{asset('css/student/auth/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('css/student/auth/mdb.min.css')}}" rel="stylesheet">
   
   
 </head>
 
 <body class="background">
 <!-- Matomo -->

 <!-- End Matomo Code -->
 <div id='placeholder'> 
     
         <div class="container">
   <div class="jumbotron">
     <div class="inner-container">
 
       <div class="inner-container-header">
         <img class="imglogos" src={{asset('image/student/auth/logo.png')}}
              height="80" width="80">
         <p class="help-block titling">
           ورود به همپا
         </p>
       </div>
 
       <div class="inside-jumbotron">
 
         <!-- Form  -->
         <form>
 
           <div class="inner-container-body">
             <button type="submit" name="#" value="#" style="display: none">
             </button>
            
 
             
               <h5 class="otptitle"> لطفا رمز خود را وارد کنید.</h5>
             
             <!-- Change Username  -->
             <div class="back-center">      
                 <span class="tel"> شماره موبایل رو بفرست اینجا </span>
               
 
             </div>
 
             <!-- Insert OTP -->
             
               <input maxlength="5" id="otpinput" type="number" required="" min="0" inputmode="numeric" pattern="[0-9]*"
                      placeholder="XXXXX" autocomplete="off" name="#" minlength="0"
                      title='لطفا عدد وارد کنید' autofocus/>
             
 
             <div dir="rtl" class="alert-container center">
               <div class="loginerror-container">
          
                 <div dir="rtl" class="loginerror"></div>
               </div>
             </div>
 
           </div>
           <!-- Login Button -->
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
  <footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
    .تمامی حقوق مادی و معنوی این وب سایت متعلق به شرکت کاروفن گسترآراد می باشد
    </div>
    <!-- Copyright -->
  
  </footer>
 </body>
 <script>
       






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

</script>
 </html>