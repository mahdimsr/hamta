@extends('admin.dashboard.layout')

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
					<form method="post" action="{{route('admin_orientations_edit')}}">

						{{csrf_field()}}

						<input name="id" hidden value="{{$orientation->id}}">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر گرایش</label>
									<input name="urlOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: tenth-grade" value="{{$orientation->url}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد گرایش</label>
									<input name="codeOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 10" value="{{$orientation->code}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان گرایش</label>
									<input name="titleOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: مقطع دهم" value="{{$orientation->title}}">
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