@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{$scholarship->student->name . ' ' . $scholarship->student->familyName}}</h4>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>پیغام دانش آمور</label>
								<p>{{$scholarship->stdMessage}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">پاسخ به درخواست</h4>
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
					<form method="POST" action="{{route('admin_scholarships_edit',['url' => $scholarship->url])}}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>پیغام ادمین</label>
									<textarea dir="rtl" name="adminMessage" rows="5" class="form-control"
											  placeholder="متن درخواست خود را وارد نمایید" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>پیغام ادمین</label>
									<select dir="rtl" name="status" class="form-control" required>
										<option value="IN-PROGRESS" {{ old('status')==$scholarship->status? 'selected' : '' }}>درحال پردازش</option>
										<option value="ACCEPT" {{ old('status')==$scholarship->status? 'selected' : '' }}>پذیرش بورسیه</option>
										<option value="DECLINE" {{ old('status')==$scholarship->status? 'selected' : '' }}>رد کردن درخواست</option>
									</select>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-info btn-fill pull-right">پردازش</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection
