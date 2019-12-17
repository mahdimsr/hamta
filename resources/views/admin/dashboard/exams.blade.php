@extends('layouts.admin_dashboard')
@section('style')
	<style>

	</style>
@endsection
@section('content')

	<div class="row" dir="rtl">



		<div class="col-md-4 s-floatR">

			<div class="card cards">
				<div class="header">
					<h4 class="title">آزمون های درس به درس</h4>
					<p class="category">تمامی آزمون های درس به درس</p>
				</div>
				<div class="content">
					<hr>
					<div id="" class="">
						<a href="{{route('admin_ltlExams')}}">
							<img class="image" src="{{asset('image/admin/dashboard/exam-lesson.jpg')}} ">
						</a>
					</div>

					<div class="footer">
                        <hr style="margin-top: 20px;">
						<h5>توضیحات</h5>
						<p>ایجاد آزمون برای درس های دسته بندی شده هر گرایش به همراه پاسخ نامه تشریحی و تستی.</p>
						<hr>
						<div class="stats">
							<i class="fa fa-clock-o"></i> {{ $lessonExams }} آزمون در انتظار انتشار
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-4 s-floatR">
			<div class="card cards">

				<div class="header">
					<h4 class="title">آزمون های جایزه دار</h4>
					<p class="category">تمامی آزمون های جایزه دار</p>
				</div>
				<div class="content">
					<hr>
					<div id="" class="">
                        <a href="{{route('admin_giftExams')}}">
							<img class="image" src="{{asset('image/admin/dashboard/gift-exam.jpg')}} ">
						</a>
					</div>
					<div class="footer">
						<hr style="margin-top: 20px;">
						<h5>توضیحات</h5>
						<p>ایجاد آزمون برای انواع دروس ثبت شده برای هر گرایش ، تخصیص کد تخفیف برای نفرات برتر.</p>
						<hr>
						<div class="stats">
							<i class="fa fa-clock-o"></i> {{ $giftExams }} آزمون در انتظار انتشار
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-md-4 ">
			<div class="card disabled">

				<div class="header">
					<h4 class="title">آزمون های جامع</h4>
					<p class="category">تمامی آزمون های جامع</p>
				</div>
				<div class="content">
					<hr>
					<div id="" class="">
						<a class="isDisabled tooltip-sina" aria-disabled="true" href="#">
							<span class="tooltiptext">غیر فعال می باشد</span>
							<img id="disableds" class="image" src="{{asset('image/admin/dashboard/General-exam.jpg')}} ">
						</a>

					</div>
					<div class="footer">
						<hr style="margin-top: 20px;">
						<h5>توضیحات</h5>
                        <p>ایجاد آزمون های جامع برای گرایش های مختلف. <br> (راه اندازی در نسخه های آینده)</p>
						<hr>
						<div class="stats">
							<i class="fa fa-clock-o"></i>غیر فعال
						</div>
					</div>
				</div>
			</div>
		</div>







	</div>

@endsection

@section('script')



@endsection
