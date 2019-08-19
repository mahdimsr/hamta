@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">افزودن مقطع</h4>
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
					<form method="post"
						  action="{{$modify == 0? route('admin_lessons_add') : route('admin_lessons_edit',['url' => $lesson->url])}}">

						{{csrf_field()}}


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر درس</label>
									<input name="urlLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: tenth-grade"
										   value="{{old('urlLesson') ? old('urlLesson') : ''}} {{ $modify==1 && !old('urlLesson') ? $lesson->url : '' }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد درس</label>
									<input name="codeLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10"
										   value="{{old('codeLesson') ? old('codeLesson') : ''}} {{ $modify==1 && !old('codeLesson') ? $lesson->code : '' }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان درس</label>
									<input name="titleLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: مقطع دهم"
										   value="{{old('titleLesson') ? old('titleLesson') : ''}} {{ $modify==1 && !old('titleLesson') ? $lesson->title : '' }}">
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-right">ویرایش</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection