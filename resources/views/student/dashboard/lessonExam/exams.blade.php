@extends('layouts.student_dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('css/student/dashboard/exams.css') }}">

@endsection
@section('content')

<input type="search" placeholder="search">
<hr>
<div class="jumbotron jumbotron-fluid" dir="rtl">
    <div class="container">
      <h4 class="display-4">
          <div id="circle-payeh"></div>
        پایه
    </h4>
      <div class="lead">

        <ul class="ks-cboxtags">
            {{-- حلقه هم در ایدی و هم در فور --}}
            <li><input type="checkbox" id="checkboxOne" ><label for="checkboxOne">دوازدهم</label></li>
            <li><input type="checkbox" id="checkboxTwo"><label for="checkboxTwo">یازدهم</label></li>
            <li><input type="checkbox" id="checkboxThree"><label for="checkboxThree">دهم</label></li>

          </ul>

      </div>
    </div>
  </div>
  <hr>
  <h4 dir="rtl">آزمون های درس به درس</h4>

  <div id="app" class="containerC">
      @foreach ($lessonExams as $lessonExam )
      <a href="{{ route('student_dashboard_lessonExam_details',['exm'=>$lessonExam->exm]) }}">
      <card data-image="{{asset('image/student/auth/auth.jpg')}}">
        <h4 slot="header">{{ $lessonExam->title }}</h4>
      </card>
      </a>
      @endforeach
      </div>
@endsection

@section('script')
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js'></script>
    <script type="text/javascript">
Vue.config.devtools = true;

Vue.component('card', {
  template: `
    <div class="card-wrap"
      @mousemove="handleMouseMove"
      @mouseenter="handleMouseEnter"
      @mouseleave="handleMouseLeave"
      ref="card">
      <div class="card"
        :style="cardStyle">
        <div class="card-bg" :style="[cardBgTransform, cardBgImage]"></div>
        <div class="card-info">
          <slot name="header"></slot>
          <slot name="content"></slot>
        </div>
      </div>
    </div>`,
  mounted() {
    this.width = this.$refs.card.offsetWidth;
    this.height = this.$refs.card.offsetHeight;
  },
  props: ['dataImage'],
  data: () => ({
    width: 0,
    height: 0,
    mouseX: 0,
    mouseY: 0,
    mouseLeaveDelay: null }),

  computed: {
    mousePX() {
      return this.mouseX / this.width;
    },
    mousePY() {
      return this.mouseY / this.height;
    },
    cardStyle() {
      const rX = this.mousePX * 30;
      const rY = this.mousePY * -30;
      return {
        transform: `rotateY(${rX}deg) rotateX(${rY}deg)` };

    },
    cardBgTransform() {
      const tX = this.mousePX * -40;
      const tY = this.mousePY * -40;
      return {
        transform: `translateX(${tX}px) translateY(${tY}px)` };

    },
    cardBgImage() {
      return {
        backgroundImage: `url(${this.dataImage})` };

    } },

  methods: {
    handleMouseMove(e) {
      this.mouseX = e.pageX - this.$refs.card.offsetLeft - this.width / 2;
      this.mouseY = e.pageY - this.$refs.card.offsetTop - this.height / 2;
    },
    handleMouseEnter() {
      clearTimeout(this.mouseLeaveDelay);
    },
    handleMouseLeave() {
      this.mouseLeaveDelay = setTimeout(() => {
        this.mouseX = 0;
        this.mouseY = 0;
      }, 1000);
    } } });



const app = new Vue({
  el: '#app' });

    </script>

@endsection

