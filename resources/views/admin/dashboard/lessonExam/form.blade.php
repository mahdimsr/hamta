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
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">افزودن آزمون درس به درس</h4>
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
					<form method="post" action="{{route('admin_lExam_add')}}" enctype="multipart/form-data">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>درس مربوط به آزمون</label>
									@foreach($gradeLessons as $gradeLesson)


										<label class="checkbox-inline">
											<input type="checkbox" name="gradeLessonsCode[]" value="{{$gradeLesson->code}}">{{$gradeLesson->title}}</label>


									@endforeach
									<div class="invalid-feedback">
										<small>{{ $errors->first('gradeLessonsCode') }}</small>
									</div>

								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>قیمت ( به ریال)</label>
									<input name="price" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 50000"
										   value="{{ $modify == 0 ? old('price') ? old('price') : '' : $lessonExam->price}}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('price') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>عنوان آرمون</label>
									<input name="title" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: درس فیزیکدوم دبیرستان، فصل اول"
										   value="{{$modify == 0 ? old('title') ? old('title') : '' : $lessonExam->title }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('title') }}</small>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>توضیحات</label>
									<textarea name="description" dir="rtl" rows="5" class="form-control"
											  placeholder="مثلا بگو که این آزمون مناسب چه کسایی هستش، برای مرور درس خوبه یا برای شب امتحان یا برای کنکور و ....">{{$modify == 0 ? old('description') ? old('description') : '' : $lessonExam->description}}</textarea>
									<div class="invalid-feedback">
										<small>{{ $errors->first('description') }}</small>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>پاسخنامه</label>
									<input name="answerSheet" dir="rtl" type="file" class="form-control"
									>
									<div class="invalid-feedback">
										<small>{{ $errors->first('answerSheet') }}</small>
									</div>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-info btn-fill pull-right">مرحله بعد</button>

						<a href="{{route('admin_ltl_exams_question')}}"
						   class="btn btn-success btn-fill">درج سوالات</a>

						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection
