@extends('layouts.admin_dashboard')
@section('style')

	
@endsection
<style>
	.modal {
		position: relative;
		left: 0;
		bottom: 0;
		width: 100%;
		height: 60px;
		z-index: 999;
	
		flex-direction: column;
		align-items: center;
		justify-content: center;
		transition: 0.4s;
	  }
	  .modal-container {
		
		max-width: 720px;
		width: 100%;
		border-radius: 10px;
		overflow: hidden;
		position: absolute;
		opacity: 0;
		pointer-events: none;
		transition-duration: 0.3s;
		background: #fff;
		height: 60%;
		-webkit-transform: translateY(100px) scale(0.4);
				transform: translateY(100px) scale(0.4);
	  }
	  
	  .modal-left {
	  
		background: #fff;
		
		transition-duration: 0.5s;
		-webkit-transform: translateY(80px);
				transform: translateY(80px);
		opacity: 0;
	  }
	  .modal-button {
		color: #7d695e;
	
		font-size: 18px;
		cursor: pointer;
		border: 0;
		outline: 0;
		padding: 10px 40px;
		border-radius: 30px;
		background: white;
		box-shadow: 0 10px 40px rgba(0, 0, 0, 0.16);
		transition: 0.3s;
	  }
	  .modal-button:hover {
		border-color: rgba(255, 255, 255, 0.2);
		background: rgba(255, 255, 255, 0.8);
	  }
	  .modal-right {
		flex: 2;
		font-size: 0;
		transition: 0.3s;
		overflow: hidden;
	  }
	  .modal-right img {
		width: 100%;
		height: 100%;
		-webkit-transform: scale(2);
				transform: scale(2);
		-o-object-fit: cover;
		   object-fit: cover;
		transition-duration: 1.2s;
	  }
	  .modal.is-open {
		height: 100%;
		background: rgba(51, 51, 51, 0.85);
	  }
	  .modal.is-open .modal-button {
		opacity: 0;
	  }
	  .modal.is-open .modal-container {
		opacity: 1;
		transition-duration: 0.6s;
		pointer-events: auto;
		-webkit-transform: translateY(0) scale(1);
				transform: translateY(0) scale(1);
	  }
	  .modal.is-open .modal-right img {
		-webkit-transform: scale(1);
				transform: scale(1);
	  }
	  .modal.is-open .modal-left {
		-webkit-transform: translateY(0);
				transform: translateY(0);
		opacity: 1;
		transition-delay: 0.1s;
	  }
	  .modal-buttons {
		display: flex;
		justify-content: space-between;
		align-items: center;
	  }
	  .icon-button {
		outline: 0;
		position: absolute;
		right: 10px;
		top: 12px;
		width: 32px;
		height: 32px;
		border: 0;
		background: 0;
		padding: 0;
		cursor: pointer;
	  }
	  
	  @media (max-width: 750px) {
		.modal-container {
		  width: 90%;
		}
	  
	   
	  }
	  
	</style>
@section('content')

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
									<img src="https://images.unsplash.com/photo-1512486130939-2c4f79935e4f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dfd2ec5a01006fd8c4d7592a381d3776&auto=format&fit=crop&w=1000&q=80" alt="">
								  </div>
								  <button class="icon-button close-button">
									  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
								  <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
							  </svg>
									</button>
								</div>
								<button class="modal-button">دکمه نمایش کارنامه</button>
							  
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
@section('script')
<script>

	const body = document.querySelector("body");
	const modal = document.querySelector(".modal");
	const modalButton = document.querySelector(".modal-button");
	const closeButton = document.querySelector(".close-button");
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
@endsection
