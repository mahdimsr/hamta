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
					<form method="post" action="{{  $modify == 0 ? route('admin_grades_add') : route('admin_grades_edit', ['url' => $grade->url]) }}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر مقطع</label>
									<input name="urlGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: tenth-grade" value="{{old('url') ? old('url') : ''}} {{ $modify==1 && !old('url') ? $grade->url : '' }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد مقطع</label>
									<input name="codeGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10" value="{{old('code') ? old('code') : ''}} {{ $modify==1 && !old('code') ? $grade->code : '' }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان مقطع</label>
									<input name="titleGrade" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: مقطع دهم" value="{{old('title') ? old('title') : '' }} {{ $modify==1 && !old('title') ? $grade->title : '' }}">
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
