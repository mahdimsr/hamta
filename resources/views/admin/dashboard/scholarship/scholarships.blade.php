@extends('layouts.admin_dashboard')
@section('style')



@endsection
<style>
.modal {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 60px;

	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	transition: 0.4s;
  }
  .modal-container {
	display: flex;
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

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">بورسیه ها</h4>
					<p class="category text-right">زیرنویس جدول</p>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>نام و نام خانوادگی</th>
						<th>وضعیت درخواست</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($scholarships as $scholarShip)
							<tr>
								<td>{{$scholarShip->student->name .' ' .$scholarShip->student->familyName}}</td>
								<td>{{$scholarShip->persianStatus}}</td>
								<td>
									<a href="{{route('admin_scholarships_show',['url' => $scholarShip->url])}}"
									   style="font-size: 12px;" class="btn btn-info">
										مشاهده
									</a>
								</td>
							</tr>
						@endforeach

						</tbody>
					</table>

				</div>
			

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
