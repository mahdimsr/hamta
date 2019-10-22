@extends('layouts.admin_dashboard')
@section('link')


@endsection
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
                        <b>عنوان</b> بهتر است خوانا و کلمه ای مناسب باشد. عبارت وارد شده تقریبا در همه بخش های مربوط به
                        آزمون قرار است نمایش داده شود.
                    </p>
                    <p class="description text-right">
                        <b>قیمت</b> مبلغی که دانش آموز برای شرکت در آزمون باید پرداخت کند و باید بر حسب ریال باشد.
                    </p>
                    <p class="description text-right">
                        <b>زمان آزمون</b> مدت زمانی که دانش آموز می تواند به سوالات پاسخ دهد. دقت شود که زمان را بر حسب
                        دقیقه وارد نمایید.
                    </p>
                    <p class="description text-right">
                        <b>تاریخ فعال شدن آزمون</b> تاریخ روزی که آزمون قرار است فعال شود و دانش آموزان
                        میتوانند در آزمون شرکت کنند.
                    </p>
                    @if($modify == 0)
                        <p class="description text-right">
                            <b>گرایش و درس های آزمون</b> تعیین میکند که آزمون مربوط به چه گرایشی میتواند باشد و مطابق با
                            آن گرایش میتوانید درس هایی که قرار است از آن ها سوال طرح شود را انتخاب کنید.
                        </p>
                    @endif
                    <p class="description text-right">
                        <b>پاسخنامه</b> باید یک فایل از نوع پی دی اف باشد که پاسخ صحیح سوالات آزمون در آن مشخص شده باشد.
                        در صورتی که پاسخنامه در مرحله ایجاد آزمون آماده نیست میتوانید در روز های آینده آن را آماده و
                        آپلود کنید.
                    </p>
                    <p class="description text-right">
                        <b>توضیحات</b> مشخصاتی از آزمون که ذکر کردن آنها باعث تعامل بهتر دانش آموز با سامانه میشود
                        مانند، مباحثی که از درس های انتخاب شده برای طرح سوال انتخاب شده است و ...
                    </p>
                </div>
                <hr>
            </div>
        </div>

        <div class="col-md-7">
            <div dir="rtl" class="card ">
                <div class="header ">
                    <h4 class="title">{{ $modify==0? 'افزودن آزمون درس به درس' : 'ویرایش آزمون درس به درس' }}</h4>
                </div>

                <div class="content">
                    <form method="post"
                          action="{{ $modify==0 ? route('admin_ltlExams_add') : route('admin_ltlExams_edit',[ 'exm' => $lessonExam->exm])}}"
                          role="form"
                          enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="row">

                            <div class="col-md-6 s-floatR">
                                <div class="form-group">
                                    <label class="control-label">عنوان</label>
                                    <input name="title" class="form-control" type="text"
                                           maxlength="20" tabindex="1" placeholder="عنوان آزمون را وارد نمایید"
                                           value="{{old('title')}}{{ $modify==1 && !old('title') && $lessonExam->title ? $lessonExam->title : '' }}">
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('title') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6 s-floatL">
                                <div class="form-group">
                                    <label class="control-label">قیمت (تومان)</label>
                                    <input name="price" class="form-control" type="text"
                                           maxlength="10" tabindex="2"
                                           value="{{old('price')}}{{ $modify==1 && !old('price') && $lessonExam->price ? $lessonExam->price : '' }}"
                                           placeholder="قیمت آزمون را وارد نمایید"/>
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('price') }}</small>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 s-floatR">
                                <div class="form-group">
                                    <label>تاریخ فعال شدن آزمون </label>
                                    <input dir="rtl" id="activeDate" name="activeDate" type="text"
                                           class="form-control"
                                           tabindex="3"
                                           value="{{ old('activeDate') }}{{ $modify==1 && !old('activeDate') && $lessonExam->activeDate ? $lessonExam->activeDate : '' }}">
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('activeDate') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 s-floatL">
                                <div class="form-group">
                                    <label class="control-label">زمان آزمون (دقیقه)</label>
                                    <input name="duration" class="form-control" type="text"
                                           maxlength="10" tabindex="4"
                                           value="{{old('duration')}}{{ $modify==1 && !old('duration') && $lessonExam->duration ? $lessonExam->duration : '' }}"
                                           placeholder="زمان آزمون را وارد نمایید"/>
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('duration') }}</small>
                                </div>
                            </div>

                        </div>

                        @if($modify == 0)

                            <div class="row">

                                <div class="col-md-6 s-floatR" >
                                    <div class="form-group">
                                        <label class="control-label">گرایش</label>
                                        <select name="orientation" class="form-control menu dropdown-radius hide-search"
                                                id="ori-select">
                                            <option value="" disabled selected>گرایش آزمون را انتخاب نمایید
                                            </option>
                                            @foreach($orientations as $orientation)
                                                <option
                                                        value="{{$orientation->id}}"
                                                        {{old('orientation') == $orientation->id ? 'selected' : ''}}{{ $modify==1 && !old('orientation') && $lessonExam->orientation()[0]->id == $orientation->id ? 'selected' : '' }}>
                                                    {{$orientation->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('orientation') }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 s-floatL" >
                                    <div class="form-group">
                                        <label class="control-label">دسته بندی دروس</label>
                                        <select name="category" id="category-select" class="form-control menu dropdown-radius"
                                                >
                                            <option id="0" value="" disabled selected>دسته بندی دروس آزمون را انتخاب نمایید
                                            </option>
                                            @foreach($categories as $category)
                                                <option
                                                        value="{{$category->id}}"
                                                        {{old('category') == $category->id ? 'selected' : ''}}>
                                                    {{$category->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('category') }}</small>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endif

                        <div class="row">

                            @if($modify==0)
                                <div class="col-md-6 s-floatR" >
                                    <label for="lesson-select" class="control-label">درس های آزمون</label>
                                    <select class="form-control menu12 dropdown-radius" id="lesson-select" name="gradeLessons[]" multiple data-placeholder="درس های آزمون را انتخاب نمایید">
                                        <option value="" id="0" disabled selected>دسته بندی دروس آزمون را انتخاب نمایید
                                        </option>
                                        @foreach($gradeLessons as $gradeLesson)
                                            <option data-content="{{$gradeLesson->orientationId.$gradeLesson->lesson->parentId}}"
                                                    value="{{$gradeLesson->id}}" {{in_array($gradeLesson->id, old("gradeLessons") ?: []) ? 'selected': ''}}
                                            >{{$gradeLesson->lesson_grade}} - {{ $gradeLesson->sort_title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('gradeLessons') }}</small>
                                    </div>
                                </div>
                            @endif

                            <div class="{{ $modify==0 ? 'col-md-6' : 'col-md-12' }} s-floatL">
                                <div class="form-group">
                                    <label class="control-label">پاسخ نامه سوالات (به صورت pdf)</label>
                                    <div class="input-file-container">
                                        <input class="input-file" name="answerSheet" id="my-file" type="file"
                                               accept=" .pdf">
                                        <label tabindex="0" for="my-file" class="input-file-trigger text-center">
                                            {{ $modify == 1 ? $lessonExam->answerSheet != null ? 'پاسخنامه دارد، ولی میتوانید مجددا آپلود کنید' : 'پاسخنامه ندارد' : 'آپلود پاسخنامه'}}
                                        </label>
                                    </div>
                                    <p class="file-return"></p>
                                    @if($modify == 1 && $lessonExam->answerSheet != null)
                                        <a class="file-return" href="{{$lessonExam->answerSheetPath}}">دانلود
                                            پاسخنامه</a>
                                    @endif
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('answerSheet') }}</small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">توضیحات</label>
                                    <textarea name="description" class=" textarea-radius form-control" type="text" placeholder="توضیحات مربوط به آزمون را وارد نمایید"
                                              tabindex="5">{{old('description')}}{{ $modify==1 && !old('description') && $lessonExam->description ? $lessonExam->description : '' }}</textarea>
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('description') }}</small>
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

@section('script')


    <script>

        var id, options;
        var lessons    = $('#lesson-select option').clone();
        var categories = $('#category-select option').clone();

        $('#activeDate').pDatepicker({

            autoClose    : true,
            initialValue : true,
            format       : 'YYYY/MM/DD',
            responsive   : true,
            toolbox      : {
                calendarSwitch : {
                    enabled : false
                },
                submitButton   : {enabled : true},
                todayButton    : {
                    enabled : false
                }
            }
        });

        $("#ori-select").change(function()
        {
            if(!$("#ori-select").val())
            options = categories.filter('[id=0]');
            else
            options = categories;
            $('#category-select').html(options);
            $('#category-select').prop('selectedIndex',0).change();

        });

        if($("#ori-select").val()!='')
        {
            if(!$("#ori-select").val())
            options = categories.filter('[id=0]');
            else
            options = categories;
            $('#category-select').html(options);

        }

        $("#category-select").change(function ()
        {
            var id     = $("#category-select").val();
            var oriId  = $("#ori-select").val();
            options    = lessons.filter('[data-content=' + oriId + id + ']');
            $('#lesson-select').html(options);
            $('#lesson-select').trigger('change');

        });

          if($("#category-select").val()!='')
          {

            var id     = $("#category-select").val();
            var oriId  = $("#ori-select").val();
            options    = lessons.filter('[data-content=' + oriId + id + ']');
            $('#lesson-select').html(options);

          }
    </script>

@endsection
