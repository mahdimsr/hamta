@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">ویرایش گرایش</h4>
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
						  action="{{  $modify == 0 ? route('admin_orientations_add') : route('admin_orientations_edit', ['url' => $orientation->url]) }}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر گرایش</label>
									<input name="urlOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: tenth-grade"
										   value="{{old('urlOrientation') ? old('urlOrientation') : ''}} {{ $modify==1 && !old('urlOrientation') ? $orientation->url : '' }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد گرایش</label>
									<input name="codeOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10"
										   value="{{old('codeOrientation') ? old('codeOrientation') : ''}} {{ $modify==1 && !old('codeOrientation') ? $orientation->code : '' }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان گرایش</label>
									<input name="titleOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: مقطع دهم"
										   value="{{old('titleOrientation') ? old('titleOrientation') : ''}} {{ $modify==1 && !old('titleOrientation') ? $orientation->title : '' }}">
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-right">به روزرسانی</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection