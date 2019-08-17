@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
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
							<div class="col-md-4">
								<div class="form-group">
									<label>گرایش آزمون</label>
									<select dir="rtl" name="orientationUrl" class="form-control" required>
										<option selected disabled>گرایش درس را انتخاب نمایید</option>
										@foreach ( $orientations as $orientation )
											<option value="{{ $orientation->url }}" {{ $orientation->url == $orientation->url? 'selected' : '' }}>{{ $orientation->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>مقطع آزمون</label>
									<select dir="rtl" name="gradeUrl" class="form-control" required>
										<option selected disabled>گرایش درس را انتخاب نمایید</option>
										@foreach ( $grades as $grade )
											<option value="{{ $grade->url }}" {{ $grade->url == $grade->url? 'selected' : '' }}>{{ $grade->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>درس مربوط به آزمون</label>
									<select dir="rtl" name="lessonUrl" class="form-control" required>
										<option selected disabled>گرایش درس را انتخاب نمایید</option>
										@foreach ( $lessons as $lesson )
											<option value="{{ $lesson->url }}" {{ $lesson->url == $lesson->url? 'selected' : '' }}>{{ $lesson->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>قیمت ( به ریال)</label>
									<input name="price" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 50000">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>عنوان آرمون</label>
									<input name="title" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: درس فیزیکدوم دبیرستان، فصل اول">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>توضیحات</label>
									<textarea name="description" dir="rtl" rows="5" class="form-control"
											  placeholder="مثلا بگو که این آزمون مناسب چه کسایی هستش، برای مرور درس خوبه یا برای شب امتحان یا برای کنکور و ...."></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>پاسخنامه</label>
									<input name="answerSheet" dir="rtl" type="file" class="form-control">
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-right">مرحله بعد</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection
