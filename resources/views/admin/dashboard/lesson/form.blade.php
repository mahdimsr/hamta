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
						<b>عنوان درس</b> مانند ریاضی، فیزیک، زیست و ... . شما نباید برای مثال از عبارت درس ریاضی استفاده کنید و فقط کلمه و عنوان درس را به تنهایی بنویسید کافی است.
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
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">درس</h4>
				</div>

				<div class="content">
					<form method="post"
						  action="{{$modify == 0? route('admin_lessons_add') : route('admin_lessons_edit',['url' => $lesson->url])}}">

						{{csrf_field()}}


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر درس</label>
									<input name="urlLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: math" tabindex="3"
										   value="{{old('urlLesson') ? old('urlLesson') : ''}} {{ $modify==1 && !old('urlLesson') ? $lesson->url : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('urlLesson') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان درس</label>
									<input name="titleLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: ریاضی" tabindex="2"
										   value="{{old('titleLesson') ? old('titleLesson') : ''}} {{ $modify==1 && !old('titleLesson') ? $lesson->title : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('titleLesson') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد درس</label>
									<input name="codeLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10" tabindex="1"
										   value="{{old('codeLesson') ? old('codeLesson') : ''}} {{ $modify==1 && !old('codeLesson') ? $lesson->code : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('codeLesson') }}</small>
									</div>
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-left" tabindex="4">اعمال</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>

	</div>

@endsection
