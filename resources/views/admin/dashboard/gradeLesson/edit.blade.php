@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">ویرایش درس</h4>
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
					<form method="post" action="{{route('admin_gradeLessons_edit',['code' => $gradeLesson->code])}}">

						{{csrf_field()}}


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>گرایش درس</label>
									<select dir="rtl" name="orientation" class="form-control" required>
										<option selected disabled>گرایش درس را انتخاب نمایید</option>
										@foreach ( $orientations as $orientation )
											<option value="{{ $orientation->url }}" {{ $orientation->url == $gradeLesson->orientation->url? 'selected' : '' }}>{{ $orientation->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>نوع درس</label>
									<select dir="rtl" name="type" class="form-control" required>
										<option selected disabled>نوع درس را انتخاب نمایید</option>
										<option value="{{ 'GENERAL' }}" {{ $gradeLesson->type =='GENERAL'? 'selected' : '' }}>
											عمومی
										</option>
										<option value="{{ 'EXPERT' }}" {{ $gradeLesson->type =='EXPERT'? 'selected' : '' }}>
											تخصصی
										</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>مقطع درس</label>
									<select dir="rtl" name="grade" class="form-control" required>
										<option selected disabled>مقطع درس را انتخاب نمایید</option>
										@foreach ( $grades as $grade )
											<option value="{{ $grade->url }}" {{ $grade->url == $gradeLesson->grade->url? 'selected' : '' }}>{{ $grade->title }}</option>
										@endforeach
									</select>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>ضریب درس</label>
									<input name="ratio" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 4" value="{{$gradeLesson->ratio}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>عنوان درس</label>
									<select dir="rtl" name="lesson" class="form-control" required>
										<option selected disabled>درس را انتخاب کنید</option>
										@foreach ( $lessons as $lesson )
											<option value="{{ $lesson->url }}" {{ $gradeLesson->lesson->url == $lesson->url? 'selected' : '' }}>{{ $lesson->title.' - '.$lesson->code }}</option>
										@endforeach
									</select>
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