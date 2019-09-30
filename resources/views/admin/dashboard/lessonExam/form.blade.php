@extends('layouts.admin_dashboard')

@section('content')

	<div class="row" dir="rtl">

		<div class="col-md-5">
			<div class="card ">
				<div class="content">
					<div class="author">
						<a href="#">
							<img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px"
								 height="60px"/>

							<h4 class="title">راهنما<br/>
								<small>لطفا به نکات زیر توجه کنید</small>
							</h4>
							<hr/>
						</a>
					</div>
					<p class="description text-right">
						<b>کد درس</b> باید یک عدد دورقمی باشد مانند 02 یا 96. از کد درس در موارد مختلف تلاش میکنیم
						که
						با خواندن کد، درس را بفهمیم پس بهتره کدی که وارد میکنید در درس ها تکراری نباشد.
					</p>
					<p class="description text-right">
						<b>عنوان درس</b> مانند ریاضی، فیزیک، زیست و ... . شما نباید برای مثال از عبارت درس ریاضی استفاده
						کنید و فقط کلمه و عنوان درس را به تنهایی بنویسید کافی است.
					</p>
					<p class="description text-right">
						<b>لینک درس</b> باید یک کلمه انگلیسی باشد. از لینک درس در بخش آدرس دهی در مرورگر استفاده
						میکنیم. پس پیشنهاد میشود که عنوان درس و لینک درس یک مفهوم را برسانند. برای مثال اگر عنوان درس
						ریاضی است بهتر است که لینک درس math باشد.
					</p>
					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/> عنوان: ریاضی <br/> کد:03 <br/> لینک: math
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card ">
				<div class="header ">
					<h4 class="title">افزودن آزمون درس به درس</h4>
				</div>

				<div class="content">
					<form id="regForm" action="">

						<h3 class="text-center">فرم ثبت مشخصات</h3>


						<div class="tab">
							<h5>مشخصات1:</h5>
							<input type="text" placeholder="نام" oninput="this.className = ''">
							<input type="text" placeholder="نام خانوادگی" oninput="this.className = ''">
						</div>

						<div class="tab">
							<h5>مشخصات2:</h5>
							<input type="text" placeholder="نام" oninput="this.className = ''">
							<input type="text" placeholder="نام خانوادگی" oninput="this.className = ''">
						</div>

						<div class="tab">
							<h5>مشخصات3:</h5>
							<input type="text" placeholder="نام" oninput="this.className = ''">
							<input type="text" placeholder="نام خانوادگی" oninput="this.className = ''">
						</div>

						<div class="tab">
							<h5>مشخصات4:</h5>
							<input type="text" placeholder="نام" oninput="this.className = ''">
							<input type="text" placeholder="نام خانوادگی" oninput="this.className = ''">
						</div>


							<div class="text-center">


								<button type="button" class="bubbly-button" id="nextBtn" onclick="nextPrev(1)">بعدی</button>
								<button type="button" class="bubbly-button2" id="prevBtn" onclick="nextPrev(-1)">قبلی</button>
							</div>



						<div dir="ltr" style="text-align:center;margin-top:40px;">
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
						</div>

					</form>

				</div>
			</div>
		</div>


	</div>

@endsection
