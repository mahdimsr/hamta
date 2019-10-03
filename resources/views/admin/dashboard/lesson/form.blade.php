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
						<b>عنوان درس</b> مانند ریاضی، فیزیک، زیست و ... . شما نباید برای مثال از عبارت درس ریاضی استفاده کنید و فقط کلمه و عنوان درس را به تنهایی بنویسید کافی است.
                    </p>
                    <p class="description text-right">
						<b>دسته بندی درس</b> در این بخش دسته بندی درس انتخاب می گردد به مانند کنکور که مجموعه دروس ریاضی یک گرایش تحت عنوان ریاضیات شناخته می شوند.
					</p>
					<p class="description text-right">
						<b>کد درس</b> باید یک عدد دورقمی باشد مانند 02 یا 96. از کد درس در موارد مختلف تلاش میکنیم
						که
						با خواندن کد، درس را بفهمیم پس بهتره کدی که وارد میکنید در درس ها تکراری نباشد.
					</p>
					<p class="description text-right">
						<b>پارامتر درس</b> باید یک کلمه انگلیسی باشد. از پارامتر درس در بخش آدرس دهی در مرورگر استفاده
						میکنیم. پس پیشنهاد میشود که عنوان درس و پارامتر درس یک مفهوم را برسانند. برای مثال اگر عنوان درس
						ریاضی است بهتر است که پارامتر درس Math باشد.
					</p>
					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/> عنوان : ریاضی (1) <br/> دسته بندی : ریاضیات <br/> کد : 03 <br/> پارامتر : Math
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{ $modify==0 ? 'افزودن درس' : 'ویرایش درس'}}</h4>
				</div>

				<div class="content">
					<form method="post"
						  action="{{$modify == 0? route('admin_lessons_add') : route('admin_lessons_edit',['url' => $lesson->url])}}">

						{{csrf_field()}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">دسته بندی</label>
                                    <select name="category" class="form-control menu dropdown-radius hide-search"
                                        >
                                        <option id="0" value="" disabled selected>دسته بندی درس را انتخاب نمایید</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}"
                                                {{old('category') == $category->id ? 'selected' : ''}}{{ $modify==1 && !old('category') && $lesson->parentId == $category->id ? 'selected' : '' }}>
                                                {{$category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('category') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group">
									<label>عنوان درس</label>
									<input name="titleLesson" dir="rtl" type="text" class="form-control"
										   placeholder="عنوان درس را وارد نمایید" tabindex="2"
										   value="{{old('titleLesson') ? old('titleLesson') : ''}} {{ $modify==1 && !old('titleLesson') ? $lesson->title : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('titleLesson') }}</small>
									</div>
								</div>
							</div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>پارامتر درس</label>
									<input name="urlLesson" dir="rtl" type="text" class="form-control"
										   placeholder="پارامتر درس را وارد نمایید" tabindex="3"
										   value="{{old('urlLesson') ? old('urlLesson') : ''}} {{ $modify==1 && !old('urlLesson') ? $lesson->url : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('urlLesson') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>کد درس</label>
									<input name="codeLesson" dir="rtl" type="text" class="form-control"
										   placeholder="کد درس وارد نمایید" tabindex="1"
										   value="{{old('codeLesson') ? old('codeLesson') : ''}} {{ $modify==1 && !old('codeLesson') ? $lesson->code : '' }}">
									<div class="invalid-feedback">
										<small>{{ $errors->first('codeLesson') }}</small>
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
