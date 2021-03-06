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
						<b>کد مقطع</b> باید یک عدد دورقمی باشد مانند 02 یا 96. از کد مقطع در موارد مختلف تلاش میکنیم که
						با خواندن کد مقطع را بفهمیم پس بهتره کد و مقطه باهم مرتبط باشند.
					</p>
					<p class="description text-right">
						<b>پارامتر مقطع</b> باید یک کلمه انگلیسی باشد. از پارامتر مقطع در بخش آدرس دهی در مرورگر استفاده
						میکنیم. پس پیشنهاد میشود که کد و پارامتر مقطع یک مفهوم را برسانند. برای مثال اگر کد مقطع 04 است
						بهتر است پارامتر مقطع را Fourth بگذارید.
					</p>
					<p class="description text-right">
						<b>عنوان مقطع</b> کلماتی مانند سوم، چهارم و ... است. شما نباید برای مثال پایه تحصیلی سوم
						دبیرستان یا این چنینی تعاریفی را در این قسمت انجام بدهید و فقط بخش سوم را میتوانید در این قسمت
						تعریف کنید.
					</p>
					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/> عنوان : سوم <br/> کد : 03 <br/> لینک : Third
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{ $modify==0 ? 'افزودن مقطع' : 'ویرایش مقطع'}}</h4>
				</div>

				<div class="content">
					<form method="post"
						  action="{{  $modify == 0 ? route('admin_grades_add') : route('admin_grades_edit', ['url' => $grade->url]) }}">

						{{csrf_field()}}

						<div class="row">

							<div class="col-md-4 s-floatR">
								<div class="form-group">
									<label>عنوان مقطع</label>
									<input name="titleGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: مقطع دهم" tabindex="1"
										   value="{{old('titleGrade') ? old('titleGrade') : '' }}{{ $modify==1 && !old('titleGrade') ? $grade->title : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('titleGrade') }}</small>
									</div>
								</div>
							</div>




							<div class="col-md-4 s-floatR">
								<div class="form-group">
									<label>کد مقطع</label>
									<input name="codeGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10" tabindex="2"
										   value="{{old('codeGrade') ? old('codeGrade') : ''}}{{ $modify==1 && !old('codeGrade') ? $grade->code : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('codeGrade') }}</small>
									</div>
								</div>
							</div>

							<div class="col-md-4 s-floatL">
								<div class="form-group">
									<label>پارامتر مقطع</label>
									<input name="urlGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: tenth-grade" tabindex="3"
										   value="{{old('urlGrade') ? old('urlGrade') : ''}}{{ $modify==1 && !old('urlGrade') ? $grade->url : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('urlGrade') }}</small>
									</div>
								</div>
							</div>

						</div>

                        <a href="{{route('admin_grades')}}" class="btn btn-info pull-left"> بازگشت <span class="fas fa-arrow-left"></span></a>
                        <button type="submit" class="btn btn-info btn-fill pull-right">اعمال</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
