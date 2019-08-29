@extends('layouts.admin_dashboard')

@section('content')

	<div class="row" dir="rtl">

		<div class="col-md-4">
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
						<b>مشخصات آزمون</b> باید یک عدد دورقمی باشد مانند 02 یا 96. از کد درس در موارد مختلف تلاش میکنیم
						که
						با خواندن کد، درس را بفهمیم پس بهتره کدی که وارد میکنید در درس ها تکراری نباشد.
					</p>
					<p class="description text-right">
						تعداد سوالات آزمون <b>20</b>
						<br/>
						تعداد سوالات درج شده <b>15</b>
					</p>
					<p class="description text-right">
						<b>لینک درس</b> باید یک کلمه انگلیسی باشد. از لینک درس در بخش آدرس دهی در مرورگر استفاده
						میکنیم. پس پیشنهاد میشود که عنوان درس و لینک درس یک مفهوم را برسانند. برای مثال اگر عنوان درس
						ریاضی است بهتر است که لینک درس math باشد.
					</p>
					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/> عنوان: ریاضی <br/> کد:03 <br/> لینک: math
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">افزودن آزمون درس به درس</h4>
				</div>

				<div class="content">
					<form method="post" action="{{route('admin_lExam_add')}}" enctype="multipart/form-data">

						{{csrf_field()}}

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<button type="submit" class="btn btn-info btn-fill pull-right">مرحله بعد</button>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>درجه سختی سوال</label>
									<select dir="rtl" name="gradeLesson" class="form-control">
										<option selected disabled>درجه سختی سوال را انتخاب نمایید</option>
										<option value="1">خیلی ساده</option>
										<option value="2">ساده</option>
										<option value="3">معمولی</option>
										<option value="4">سخت</option>
										<option value="5">حیل سحت</option>
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('orientationUrl') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>دسته بندی درس ها</label>
									<select dir="rtl" name="gradeLesson" class="form-control">
										<option selected disabled>گرایش و درس سوال را انتخاب نمایید</option>
										@foreach ( $gradeLessons as $gradeLesson )
											<option value="{{ $gradeLesson->code }}">{{ $gradeLesson->lesson->title . ' ' . $gradeLesson->grade->title .'-'.$gradeLesson->orientation->title }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('orientationUrl') }}</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>دسته بندی سوال</label>
									<select dir="rtl" name="gradeLesson" class="form-control">
										<option selected disabled>دسته بندی سوال را انتخاب نمایید</option>
										<option value="LESSON_EXAM">آزمون درس به درس</option>
										<option value="GIFT_EXAM">آزمون جایزه دار</option>
										<option value="GENERAL">عمومی</option>
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('orientationUrl') }}</small>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>صورت سوال</label>
									<textarea dir="rtl" name="text" rows="5" class="form-control"
											  placeholder="صورت سوال را بنویسید"></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>گزینه چهارم</label>
									<input name="optionFour" dir="rtl" type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>گزینه سوم</label>
									<input name="optionThree" dir="rtl" type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>گزینه دوم</label>
									<input name="optionTwo" dir="rtl" type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>گزینه اول</label>
									<input name="optionOne" dir="rtl" type="text" class="form-control">
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<a href="#" class="btn btn-fill btn-info">ذخیره سوال</a>
									<a href="#" class="btn btn-fill btn-info">درج سوال بعدی</a>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>عکس برای سوال</label>
									<input name="photo" type="file" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>گزینه صحیح</label>
									<select dir="rtl" name="answer" class="form-control">
										<option disabled>گزینه صحیح رو انتخاب کنید</option>
										<option value="test">متن گزینه اول</option>
									</select>
								</div>
							</div>
						</div>

						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection