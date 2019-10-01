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
						<b>عنوان درس</b> از بین درس هایی که در سامانه ثبت شده است، درس مد نظر را انتخاب کنید. درصورتی که درس مدنظرتان وجود ندارد میتوانید از قسمت افزودن درس در پایین همین پاراگراف اقدام کرده و درس موردنظر را در سامانه ثبت کنید.
					</p>

					<a href="{{route('admin_lessons_addShow')}}" class="btn btn-info btn-fill route-btn">افزودن درس</a>

					<p class="description text-right">
						<b>مقطع درس</b> مشخص میکند که درس انتخاب شده مربوط به چه مقطعی است.
					</p>

					<p class="description text-right">
						<b>نوع درس</b> مشخص میکند که درسی که انتخاب کردید در مقطع و گرایش انتخاب شده عمومی است یا تخصصی.
						برای مثال درس عربی در گرایش ریاضی فیزیک و تجربی عمومی است ولی در رشته انسانی تخصصی
					</p>

					<p class="description text-right">
						<b>ضریب درس</b> حالا باید ضریب درس در کنکور در رشته و گرایشی که انتخاب کردید رو مشخص کنید. مثلا درس عربی در انسانی ضریبش 4 هست ولی در بقیه گرایش ها 2
					</p>

					<p class="description text-right justify-content-center">
						<b>مثال</b> <br/> درس: ریاضی <br/> مقطع:دهم <br/> گرایش: ریاضی و فیزیک<br/> نوع درس: تخصصی<br/> ضریب: 4
					</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">{{ $modify==0 ? 'افزودن درس مختص پایه' : 'ویرایش درس مختص پایه'}}</h4>
				</div>
            {{ $errors->first('message') }}
				<div class="content">
					<form method="post"
						  action="{{$modify == 0 ? route('admin_gradeLessons_add') : route('admin_gradeLessons_edit',['code' => $gradeLesson->code])}}">

						{{csrf_field()}}

						<div class="row">
                            <div class="col-md-6">
								<div class="form-group">
									<label>دسته بندی درس</label>
									<select dir="rtl" name="orientationCategory" id="orientationCategory" class="form-control">
										<option id="0" value="" selected disabled>دسته بندی درس را انتخاب کنید</option>
										@foreach ( $orientationCategories as $orientationCategory )
											<option id="{{ $orientationCategory->orientationId }}" value="{{ $orientationCategory->id }}" {{ old('orientationCategory')==$orientationCategory->id ? 'selected' : '' }}  {{ $modify == 1 && !old('orientationCategory') && $gradeLesson->orientationCategoryId == $orientationCategory->id? 'selected' : '' }}>{{ $orientationCategory->category->title}} - {{ $orientationCategory->getPersianTypeAttribute()  }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('orientationCategory') }}</small>
									</div>
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group">
									<label>گرایش درس</label>
									<select dir="rtl" name="orientation" id="orientation" class="form-control">
										<option selected disabled>گرایش درس را انتخاب نمایید</option>
										@foreach ( $orientations as $orientation )
											<option value="{{ $orientation->id }}" {{ old('orientation')==$orientation->id ? 'selected' : '' }} {{ $modify == 1 && !old('orientation') && $orientation->id == $gradeLesson->orientationCategory->orientation->id? 'selected' : '' }}>{{ $orientation->title }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('orientation') }}</small>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>مقطع درس</label>
									<select dir="rtl" name="grade" class="form-control">
										<option selected disabled>مقطع درس را انتخاب نمایید</option>
										@foreach ( $grades as $grade )
											<option value="{{ $grade->id }}" {{ old('grade')==$grade->id ? 'selected' : '' }}  {{$modify == 1 && !old('grade') && $grade->id == $gradeLesson->gradeId? 'selected' : '' }}>{{ $grade->title }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										<small>{{ $errors->first('grade') }}</small>
									</div>
								</div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عنوان درس</label>
                                        <select dir="rtl" name="lesson" class="form-control">
                                            <option value="" id="0" selected disabled>درس را انتخاب کنید</option>
                                            @foreach ( $lessons as $lesson )
                                                <option value="{{ $lesson->id }}" {{ old('lesson')==$lesson->id ? 'selected' : '' }}  {{ $modify == 1 && !old('lesson') && $gradeLesson->lessonId == $lesson->id ? 'selected' : '' }}>{{ $lesson->title.' - '.$lesson->code }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('lesson') }}</small>
                                        </div>
                                    </div>
                                </div>
						</div>

						<button type="submit" class="btn btn-info btn-fill pull-left">اعمال</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('script')
    <script>
    $(document).ready(function()
    {
        var id,options;
        var orientationCategory=$('#orientationCategory option').clone();

    $("#orientation").change(function()
    {
        id = $("#orientation").val();
        options = orientationCategory.filter('[id=' + id + '],[id=0]');
        $('#orientationCategory').html(options);
        $('#orientationCategory').prop('selectedIndex',0).trigger('change');

    });

    if($("#orientation").val()!='')
    {

        id = $("#orientation").val();
        options = orientationCategory.filter('[id=' + id + '],[id=0]');
        $('#orientationCategory').html(options);

    }

    });
    </script>
@endsection
