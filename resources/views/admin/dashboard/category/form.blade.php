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
					<p class="description text-right">
						<b>عنوان دسته بندی</b> مانند ریاضیات ، فیزیک ، زبان و ادبیات فارسی و ... . شما نباید برای مثال از عبارت دسته بندی ریاضی استفاده کنید و فقط کلمه و عنوان دسته بندی را به تنهایی بنویسید کافی است.
					</p>
					<p class="description text-right">
						<b> پارامتر دسته بندی</b> باید یک کلمه انگلیسی باشد. از پارامتر دسته بندی در بخش آدرس دهی در مرورگر استفاده
						میکنیم. پس پیشنهاد میشود که عنوان دسته بندی و پارامتر دسته بندی یک مفهوم را برسانند. برای مثال اگر عنوان دسته بندی
						ریاضیات است بهتر است که پارامتر دسته بندی Mathematic باشد.
					</p>
					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/>عنوان: زبان و ادبیات فارسی <br/> پارامتر: Farsi
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{ $modify==0 ? 'افزودن دسته بندی' : 'ویرایش دسته بندی'}}</h4>
				</div>

				<div class="content">
					<form method="post"
						  action="{{$modify == 0? route('admin_categories_add') : route('admin_categories_edit',['url' => $category->url])}}">

						{{csrf_field()}}

                        <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>پارامتر دسته بندی</label>
                                            <input name="urlCategory" dir="rtl" type="text" class="form-control"
                                                   placeholder="پارامتر دسته بندی را وارد نمایید" tabindex="3"
                                                   value="{{old('urlCategory') ? old('urlCategory') : ''}} {{ $modify==1 && !old('urlCategory') ? $category->url : '' }}">
                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('urlCategory') }}</small>
                                            </div>
                                        </div>
                                    </div>
                            <div class="col-md-6">
								<div class="form-group">
									<label>عنوان دسته بندی</label>
									<input name="titleCategory" dir="rtl" type="text" class="form-control"
										   placeholder="عنوان دسته بندی را وارد نمایید" tabindex="2"
										   value="{{old('titleCategory') ? old('titleCategory') : ''}} {{ $modify==1 && !old('titleCategory') ? $category->title : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('titleCategory') }}</small>
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
