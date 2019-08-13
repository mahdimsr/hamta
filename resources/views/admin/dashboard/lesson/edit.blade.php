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
					<form method="post" action="{{route('admin_lessons_edit')}}">

						{{csrf_field()}}

						<input name="id" hidden value="{{$lesson->id}}">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر درس</label>
									<input name="urlLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: tenth-grade" value="{{$lesson->url}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد درس</label>
									<input name="codeGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10" value="{{$lesson->code}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان درس</label>
									<input name="titleLesson" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: مقطع دهم" value="{{$lesson->title}}">
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