@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">افزودن درس</h4>
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
					<form method="post" action="{{route('admin_gradeLessons_add')}}">

						{{csrf_field()}}


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>گرایش درس</label>
									<select dir="rtl" name="orientation" class="form-control" required>
										<option selected disabled>گرایش درس را انتخاب نمایید</option>
										@foreach ( $orientations as $orientation )
											<option value="{{ $orientation->url }}" {{ old('orientation')==$orientation->url? 'selected' : '' }}>{{ $orientation->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>نوع درس</label>
									<select dir="rtl" name="type" class="form-control" required>
										<option selected disabled>نوع درس را انتخاب نمایید</option>
										<option value="{{ 'GENERAL' }}" {{ old('type')=='GENERAL'? 'selected' : '' }}>
											عمومی
										</option>
										<option value="{{ 'EXPERT' }}" {{ old('type')=='EXPERT'? 'selected' : '' }}>
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
											<option value="{{ $grade->url }}" {{ old('grade')==$grade->url? 'selected' : '' }}>{{ $grade->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>ضریب درس</label>
									<input name="ratio" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 4" value="{{old('ratio')}}">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>کد درس</label>
									<input name="code" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 05" value="{{old('code')}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان لاتین درس</label>
									<input name="url" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: math" value="{{old('url')}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان درس</label>
									<input name="title" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: ریاضی" value="{{old('title')}}">
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-right">افزودن</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection