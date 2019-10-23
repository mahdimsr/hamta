@extends('layouts.admin_dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{ asset('css/admin/dashboard/scholarship-result.css') }}">
	<div class="row" dir="rtl">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">مشخصات درخواست دهنده</h4>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<label>اطلاعات</label>



							<div class="modal">
							  <div class="modal-container">
								<div class="modal-left">

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
							  <button class="modal-button">نمایش کارنامه</button>
							</div>
							






							<hr>
							<div class="row" id="li-margin">
								<div class="col-md-4 col-sm-4 s-floatR"><li style="display: inline-flex;"><ul>نام و نام خانوادگی:</ul><ul><p class="text-muted" >{{$scholarship->student->name . ' ' . $scholarship->student->familyName}}</p></ul></li></div>
								<div class="col-md-4 col-sm-4 s-floatR"><li style="display: inline-flex;"><ul>تاریخ تولد:</ul><ul><p class="text-muted" >{{ $scholarship->student->persian_birthday }}</p></ul></li></div>
								<div class="col-md-4 col-sm-4 s-floatL"><li style="display: inline-flex;"><ul>گرایش:</ul><ul><p class="text-muted" >{{ $scholarship->student->orientation->title }}</p></ul></li></div>
							</div>

							<div class="row" id="li-margin">
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul>استان:</ul><ul><p class="text-muted" >{{ $scholarship->student->city->province->name }}</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul> شهر:</ul><ul><p class="text-muted" >{{ $scholarship->student->city->name }}</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul> مقطع:</ul><ul><p class="text-muted" >{{ $scholarship->student->grade->title }}</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatL"><li style="display: inline-flex;"><ul>معدل:</ul><ul><p class="text-muted" >{{ $scholarship->student->average }}</p></ul></li></div>
							</div>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>متن درخواست</label>
								<p>{{$scholarship->stdMessage}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">پاسخ به درخواست</h4>
				</div>


				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="content">
					<form method="POST" action="{{route('admin_scholarships_answer',['url' => $scholarship->url])}}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>توضیحات پاسخ</label>
									<textarea dir="rtl" name="adminMessage" rows="5" class="form-control textarea-radius"
											  placeholder="به درخواست پاسخ دهید">{{$scholarship->adminMessage}}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>وضعیت درخواست</label>
									<select dir="rtl" name="status" class="form-control menu hide-search">
										<option value="IN-PROGRESS" {{ old('status')==$scholarship->status? 'selected' : '' }}{{!old('status') && $scholarship->status =='IN-PROGRESS' ? 'selected' : '' }}>درحال پردازش</option>
										<option value="ACCEPT" {{ old('status')==$scholarship->status? 'selected' : '' }}{{ !old('status') && $scholarship->status=='ACCEPT' ? 'selected' : '' }}>پذیرش بورسیه</option>
										<option value="DECLINE" {{ old('status')==$scholarship->status? 'selected' : '' }}{{ !old('status') && $scholarship->status=='DECLINE' ? 'selected' : '' }}>رد کردن درخواست</option>
									</select>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-info btn-fill pull-right">اعمال</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection
@section('script')
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

