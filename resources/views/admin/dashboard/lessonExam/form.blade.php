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
							<div class="col-md-6">
								<div class="form-group">
									<label>مقاطع مربوط به آزمون</label>
									<select id="grade-select" dir="rtl" name="grades[]" class="form-control">
										<option selected disabled>مقطع آزمون را انتخاب نمایید</option>
										@foreach ( $grades as $grade )
											<option id="{{$grade->id}}">{{ $grade->title }}</option>
										@endforeach
									</select>

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>گرایش مربوط به آزمون</label>
									<select id="ori-select" dir="rtl" name="orientation" class="form-control">
										<option selected disabled>گرایش آزمون را انتخاب نمایید</option>
										@foreach ( $orientations as $orientation )
											<option id="{{ $orientation->id }}" {{$modify == 0 ? old('orientation') == $orientation->url ? 'selected' : '' : '' }}>{{ $orientation->title }}</option>
										@endforeach
									</select>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>درس های مربوط به آزمون</label>
									<select id="gradeLesson-select" dir="rtl" name="gradeLessons[]"
											class="form-control">
										<option id="0" selected disabled>درس های آزمون را انتخاب نمایید</option>
										@foreach ( $gradeLessons as $gradeLesson )
											<option id="{{$gradeLesson->orientationCategory->orientationId.$gradeLesson->gradeId.$gradeLesson->orientationCategory->categoryId}}"
													value="{{ $gradeLesson->id }}">{{ $gradeLesson->lesson->title }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('gradeLessons') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>گروه درسی مربوط به آزمون</label>
									<select id="category-select" dir="rtl" name="category" class="form-control">
										<option id="0" selected disabled>گروه درسی آزمون را انتخاب نمایید</option>
										@foreach ( $categories as $category )
											<option id="{{ $category->id }}">{{ $category->title }}</option>
										@endforeach
									</select>
									<div style="display:none;"><select class="mdb-select"></select></div>
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
										   placeholder="مثلا: درس فیزیک دوم دبیرستان، فصل اول"
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

						<button type="submit" class="btn btn-info btn-fill pull-right">ثبت</button>

						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection

@section('script')
	<script>

		var grades       = $('#grade-select').find('option').clone();
		var orientations = $('#ori-select').find('option').clone();
		var categories   = $('#category-select').find('option').clone();
		var gradeLessons = $('#gradeLesson-select').find('option').clone();


		$("#ori-select").change(function()
		{
			$('#category-select').trigger('change');
		});

		$("#grade-select").change(function()
		{
			$('#category-select').trigger('change');
		});


		$('#category-select').change(function()
		{
			var oriId   = $('#ori-select').find('option:selected').attr('id');
			var gradeId = $('#grade-select').find('option:selected').attr('id');
			var catId   = $(this).find('option:selected').attr('id');

			var code = oriId + '' + gradeId + '' + catId;

			options = gradeLessons.filter('[id=' + code + '],[id=0]');
			$('#gradeLesson-select').html(options);
			$('#gradeLesson-select').prop('selectedIndex',0).change();


			console.log(code);
		});

	</script>
@endsection
