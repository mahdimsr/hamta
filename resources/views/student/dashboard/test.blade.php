@extends('layouts.student_dashboard')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{ asset('css/student/dashboard/student-test.css') }}">


<div class="container"></div>
<div class="modal">
  <div class="modal-container" dir="rtl">
    <div class="modal-left">
        <h1 class="modal-title">خوش آمدید</h1>
        <p class="modal-desc">صفحه ای که رو به روی خود می بنید جهت تکمیل فرایند شرکت در ازمون است</p>
        <div class="input-block">
          <label  class="input-label">کد تخفیف</label>
          <input type="text"  placeholder="کد تخفیف">
        </div>

      <div class="modal-buttons">

        <button class="input-button"><input type="submit" value="اعمال"></button>
        <button class="input-button"><a href="#">

          پرداخت از کیف پول
        </a>
        </button>
        <button class="input-button">

          <a href="#">
            شارژ کیف پول

          </a>
        </button>

      </div>

    </div>
    <div class="modal-right">
      <img src="{{ asset('image/student/dashboard/student-test.jpg') }}" alt="">
    </div>
    <button class="icon-button close-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
    <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
</svg>
      </button>
  </div>
  <button class="modal-button">اعمال</button>
</div>



<script>

const body = document.querySelector("body");
const modal = document.querySelector(".modal");
const modalButton = document.querySelector(".modal-button");
const closeButton = document.querySelector(".close-button");
const scrollDown = document.querySelector(".scroll-down");
let isOpened = false;

const openModal = () => {
  modal.classList.add("is-open");
  body.style.overflow = "hidden";
};

const closeModal = () => {
  modal.classList.remove("is-open");
  body.style.overflow = "initial";
};



modalButton.addEventListener("click", openModal);
closeButton.addEventListener("click", closeModal);

document.onkeydown = evt => {
  evt = evt || window.event;
  evt.keyCode === 27 ? closeModal() : false;
};

</script>
@endsection

