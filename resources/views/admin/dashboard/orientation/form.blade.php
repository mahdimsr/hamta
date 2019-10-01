@extends('layouts.admin_dashboard')

@section('content')

	<div class="row" dir="rtl">
		<div class="col-md-5">
			<div class="card ">

				<div class="content">
					<div class="author">
						<a href="#">
							<img class=" " src="{{asset('image/student/dashboard/help2.png')}}" alt="..." width="60px"
								 height="60px"/>

							<h4 class="title">راهنما<br/>
								<small>لطفا به نکات زیر توجه کنید</small>
							</h4>
							<hr/>
						</a>
					</div>
					<p class="description text-right">
						<b>کد گرایش</b> باید یک عدد دورقمی باشد مانند 02 یا 96. از کد گرایش در موارد مختلف تلاش میکنیم
						که
						با خواندن کد، گرایش را بفهمیم پس بهتره کدی که وارد میکنید در گرایش ها تکراری نباشد.
					</p>
					<p class="description text-right">
						<b>لینک گرایش</b> باید یک کلمه انگلیسی باشد. از لینک گرایش در بخش آدرس دهی در مرورگر استفاده
						میکنیم. پس پیشنهاد میشود که لینک گرایش یک مفهوم را برساند. برای مثال اگر گرایش مد نظر ریاضی
						فیزیک است بهتر است که لینک گرایش mathematics باشد.
					</p>
					<p class="description text-right">
						<b>عنوان گرایش</b> کلماتی مانند ریاضی فیزیک و تجربی و ... است. شما نباید برای مثال از عبارت رشته
						تحضیلی ریاضی فیزیک و یا رشته تجربی استفاده کنید و فقط عنوان گرایش را بنویسید.
					</p>
					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/> عنوان: تجربی <br/> کد:02 <br/> لینک: experimental
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{ $modify==0 ? 'افزودن گرایش' : 'ویرایش گرایش'}}</h4>
				</div>
				<div class="content">
					<form method="post"
						  action="{{  $modify == 0 ? route('admin_orientations_add') : route('admin_orientations_edit', ['url' => $orientation->url]) }}">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>پارامتر گرایش</label>
									<input name="urlOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: mathematics" tabindex="3"
										   value="{{old('urlOrientation') ? old('urlOrientation') : ''}} {{ $modify==1 && !old('urlOrientation') ? $orientation->url : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('urlOrientation') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>کد گرایش</label>
									<input name="codeOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: 01" tabindex="2"
										   value="{{old('codeOrientation') ? old('codeOrientation') : ''}} {{ $modify==1 && !old('codeOrientation') ? $orientation->code : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('codeOrientation') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عنوان گرایش</label>
									<input name="titleOrientation" dir="rtl" type="text" class="form-control"
										   placeholder="مثلا: ریاضی" tabindex="1"
										   value="{{old('titleOrientation') ? old('titleOrientation') : ''}} {{ $modify==1 && !old('titleOrientation') ? $orientation->title : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('titleOrientation') }}</small>
									</div>
								</div>
							</div>
						</div>


						<button type="submit" class="btn btn-info btn-fill pull-left" tabindex="4">اعمال</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
