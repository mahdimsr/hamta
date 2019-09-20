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



					<div class="stepwizard">
						<div class="stepwizard-row setup-panel">
							<div class="stepwizard-step">
								<a href="#step-1" type="button" class="btn btn1 btn-circle   "  >1</a>
								<p>بخش 1</p>
							</div>
							<div class="stepwizard-step">
								<a href="#step-2" type="button" class="btn btn1 btn-circle" >2</a>
								<p>بخش 2</p>
							</div>
							<div class="stepwizard-step">
								<a href="#step-3" type="button" class="btn btn1 btn-circle">3</a>
								<p>بخش 3</p>
							</div>
						</div>
					</div>
					<form role="form">
						<div class="row setup-content" id="step-1">
							<div class="col-xs-12">
								<div class="col-md-12">
									<h3 class="">بخش اول </h3>
									<div class="form-group">
										<label class="control-label">نام</label>
										<select multiple="multiple" id="my-select" name="my-select[]">
											<option value='elem_1'>elem 1</option>
											<option value='elem_2'>elem 2</option>
											<option value='elem_3'>elem 3</option>
											<option value='elem_4'>elem 4</option>
											...
											<option value='elem_100'>elem 100</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Last Name</label>
										<input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
									</div>
									<button class="ctrl-standard typ-subhed fx-bubbleDown nextBtn  pull-right" type="button" >بعدی</button>
								</div>
							</div>
						</div>
						<div class="row setup-content" id="step-2">
							<div class="col-xs-12">
								<div class="col-md-12">
									<h3> Step 2</h3>
									<div class="form-group">
										<label class="control-label">Company Name</label>
										<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
									</div>
									<div class="form-group">
										<label class="control-label">Company Address</label>
										<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
									</div>
									<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
								</div>
							</div>
						</div>
						<div class="row setup-content" id="step-3">
							<div class="col-xs-12">
								<div class="col-md-12">
									<h3> Step 3</h3>
									<button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>


	</div>

@endsection
