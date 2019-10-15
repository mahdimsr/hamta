@extends('layouts.admin_dashboard')

@section('content')

	<div class="row" dir="rtl">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">مشخصات درخواست دهنده</h4>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<label>اطلاعات</label>
							<hr>
							<div class="row" id="li-margin">
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul>نام:</ul><ul><p class="text-muted" >سینا</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul>نام خانوادگی:</ul><ul><p class="text-muted" >دولت آبادی</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul>تاریخ تولد:</ul><ul><p class="text-muted" >77/4/16</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatL"><li style="display: inline-flex;"><ul>گرایش:</ul><ul><p class="text-muted" >ریلضی فیزیک</p></ul></li></div>
							</div>

							<div class="row" id="li-margin">
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul>استان:</ul><ul><p class="text-muted" >مرکزی</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul> شهر:</ul><ul><p class="text-muted" > اراک</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatR"><li style="display: inline-flex;"><ul> مقطع:</ul><ul><p class="text-muted" >نهم</p></ul></li></div>
								<div class="col-md-3 col-sm-3 s-floatL"><li style="display: inline-flex;"><ul>معدل:</ul><ul><p class="text-muted" > 18/19</p></ul></li></div>
							</div>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>متن درخواست:</label>
								{{--<p>{{$scholarship->student->name . ' ' . $scholarship->student->familyName}}</p>--}}
								<p>{{$scholarship->stdMessage}}</p>
								{{--<p>{{$scholarship->student->grade->title}}</p>--}}
								{{--<p>{{$scholarship->student->orientation->title}}</p>--}}
								{{--<p>{{$scholarship->student->average}}</p>--}}
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
					<form method="POST" action="{{route('admin_scholarships_answer',['url' => $scholarship->url])}}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>پیغام ادمین</label>
									<textarea dir="rtl" name="adminMessage" rows="5" class="form-control textarea-radius"
											  placeholder="به درخواست پاسخ دهید">{{$scholarship->adminMessage}}</textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>پیغام ادمین</label>
									<select dir="rtl" name="status" class="form-control menu hide-search">
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
