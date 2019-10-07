@extends('layouts.student_dashboard')
@section('content')

	<div class="row" dir="rtl">
		<div class="col-md-6 col-sm-6" >
		<div class="card text-center"  >
			<div class="card-header"><h5 class="card-title">آزمون دوم</h5></div>
			<div class="hover14">
				<figure>
					<img class="" src="{{asset('image/student/dashboard/exam.jpg')}}" class="card-img-top" alt="" width="100%" height="200rem">
				</figure>
			</div>
			<div class="card-body">
				<h5 class="card-title">توضیحات</h5>
				<p class="card-text margin-card">این آزمون متشکل از سوالات چهار گزینه ای می باشد که از بانک سوالات مجموعه استخراج شده است.
					موفق باشید</p>
				<a href="{{ route('student_dashboard_lessonExams_questions') }}" class="ctrl-standard typ-subhed fx-bubbleDown">نمایش سوالات</a>
			</div>
			<div class="card-footer text-muteds text-center">
				<p>مقطع:پایه ششم  -  مرکزآموزشی:نمونه مطهری  -  تاریخ:سال96  -  سطح سختی:راحت</p>
			</div>
		</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="card text-center" >
				<div class="card-header"><h5 class="card-title">آزمون اول</h5></div>
				<div class="hover14">
				<figure>
				<img class="" src="{{asset('image/student/dashboard/exam.jpg')}}" class="card-img-top" alt="" width="100%" height="200rem">
				</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title">توضیحات</h5>
					<p class="card-text margin-card">این آزمون متشکل از سوالات چهار گزینه ای می باشد که از بانک سوالات مجموعه استخراج شده است.
					موفق باشید</p>
					<button class="ctrl-standard typ-subhed fx-bubbleDown">نمایش سوالات</button>
				</div>
				<div class="card-footer text-muteds text-center">
					<p>مقطع:پایه ششم  -  مرکزآموزشی:نمونه مطهری  -  تاریخ:سال96  -  سطح سختی:راحت</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row" dir="rtl">
		<div class="col-md-6 col-sm-6">
			<div class="card text-center" >
				<div class="card-header"><h5 class="card-title">آزمون چهارم</h5></div>
				<div class="hover14">
					<figure>
						<img class="" src="{{asset('image/student/dashboard/exam.jpg')}}" class="card-img-top" alt="" width="100%" height="200rem">
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title">توضیحات</h5>
					<p class="card-text margin-card">این آزمون متشکل از سوالات چهار گزینه ای می باشد که از بانک سوالات مجموعه استخراج شده است.
						موفق باشید</p>
					<button class="ctrl-standard typ-subhed fx-bubbleDown">نمایش سوالات</button>
				</div>
				<div class="card-footer text-muteds text-center">
					<p>مقطع:پایه ششم  -  مرکزآموزشی:نمونه مطهری  -  تاریخ:سال96  -  سطح سختی:راحت</p>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-sm-6">
			<div class="card text-center" >
				<div class="card-header"><h5 class="card-title">آزمون سوم</h5></div>
				<div class="hover14">
					<figure>
						<img class="" src="{{asset('image/student/dashboard/exam.jpg')}}" class="card-img-top" alt="" width="100%" height="200rem">
					</figure>
				</div>
				<div class="card-body">
					<h5 class="card-title">توضیحات</h5>
					<p class="card-text margin-card">این آزمون متشکل از سوالات چهار گزینه ای می باشد که از بانک سوالات مجموعه استخراج شده است.
						موفق باشید</p>
					<button class="ctrl-standard typ-subhed fx-bubbleDown">نمایش سوالات</button>
				</div>

					<div class="card-footer text-muteds text-center">
						<p>مقطع:پایه ششم  -  مرکزآموزشی:نمونه مطهری  -  تاریخ:سال96  -  سطح سختی:راحت</p>
					</div>

			</div>
		</div>

	</div>
@endsection

@section('script')

	<script type="text/javascript">


	</script>

@endsection

