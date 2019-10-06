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
                        <b>کد درس</b> باید یک عدد دورقمی باشد مانند 02 یا 96. از کد درس در موارد مختلف تلاش میکنیم
                        که
                        با خواندن کد، درس را بفهمیم پس بهتره کدی که وارد میکنید در درس ها تکراری نباشد.
                    </p>
                    <p class="description text-right">
                        <b>عنوان درس</b> مانند ریاضی، فیزیک، زیست و ... . شما نباید برای مثال از عبارت درس ریاضی استفاده
                        کنید و فقط کلمه و عنوان درس را به تنهایی بنویسید کافی است.
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

        <div class="col-md-7">
            <div dir="rtl" class="card ">
                <div class="header ">
                    <h4 class="title">افزودن آزمون جایزه دار</h4>
                </div>

                <div class="content">
                    <form method="post"
                          action="{{ $modify==0 ? route('admin_giftExams_add') : route('admin_giftExams_edit',[ 'exm' => $giftExam->exm])}}"
                          role="form"
                          enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">زمان آزمون (به دقیقه)</label>
                                    <input name="duration" class="form-control" type="text"
                                           maxlength="10" tabindex="4"
                                           value="{{old('duration')}} {{ $modify==1 && !old('duration') && $giftExam->duration ? $giftExam->duration : '' }}"
                                           placeholder="مثلا: 60 دقیقه"/>
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('duration') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">نام</label>
                                    <input name="title" class="form-control" type="text"
                                           maxlength="20" tabindex="1"
                                           value="{{old('title')}}{{ $modify==1 && !old('title') && $giftExam->title ? $giftExam->title : '' }}">
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('title') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاریخ اعلام نتایج آزمون</label>
                                    <input dir="rtl" id="resultDate" name="resultDate" type="text"
                                           class="form-control"
                                           tabindex="3"
                                           value="{{ old('resultDate') }}{{ $modify==1 && !old('resultDate') && $giftExam->resultDate ? $giftExam->resultDate : '' }}">
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('resultDate') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>زمان و تاریخ فعال شدن آزمون</label>
                                    <input dir="rtl" id="activeTime" name="activeTime" type="text"
                                           class="form-control"
                                           tabindex="3"
                                           value="{{ old('activeDate') }}{{ $modify==1 && !old('activeDate') && $giftExam->activeTime ? $giftExam->activeTime : '' }}">
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('activeDate') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($modify == 0)

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="lesson-select" class="control-label">درس های آزمون</label>
                                    <select class="form-control menu12 dropdown-radius" id="lesson-select"
                                            name="gradeLessons[]" multiple>
                                        @foreach($gradeLessons as $gradeLesson)
                                            <option data-content="{{$gradeLesson->orientationId}}"
                                                    value="{{$gradeLesson->id}}"
                                            >{{$gradeLesson->lesson_grade}} - {{ $gradeLesson->sort_title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('gradeLessons') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">گرایش</label>
                                        <select name="orientation"
                                                class="form-control menu dropdown-radius hide-search parent-select"
                                                id="ori-select" {{ $modify==1? 'disabled' : '' }}>
                                            <option id="0" value="" disabled selected>گرایش آزمون را انتخاب نمایید
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
                            </div>

                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">پاسخ نامه سوالات (به صورت pdf)</label>
                                    <div class="input-file-container">
                                        <input class="input-file" name="answerSheet" id="my-file" type="file"
                                               accept=" .pdf">
                                        <label tabindex="0" for="my-file" class="input-file-trigger text-center">
                                            {{ $modify == 1 ? $giftExam->answerSheet != null ? 'پاسخنامه دارد، ولی میتوانید مجددا آپلود کنید' : 'پاسخنامه ندارد' : 'آپلود پاسخنامه'}}
                                        </label>
                                    </div>
                                    <p class="file-return"></p>
                                    @if($modify == 1 && $giftExam->answerSheet != null)
                                        <a class="file-return" href="{{$giftExam->answerSheetPath}}">دانلود
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
                                    <textarea name="description" class=" textarea-radius" type="text"
                                              tabindex="5">{{old('description')}}{{ $modify==1 && !old('description') && $giftExam->description ? $giftExam->description : '' }}</textarea>
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
        var lessons = $('#lesson-select option').clone();



        $('#resultDate').pDatepicker({

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

        $('#activeTime').pDatepicker({

            autoClose    : true,
            initialValue : true,
            format       : 'YYYY/MM/DD HH:mm:ss',
            responsive   : true,
            toolbox      : {
                calendarSwitch : {
                    enabled : false
                },
                submitButton   : {enabled : true},
                todayButton    : {
                    enabled : false
                }
            },
            timePicker   : {
                enabled : true,
                meridian: {
                    enabled: false
                }
            }
        });

        $("#ori-select").change(function ()
        {
            id      = $("#ori-select").val();
            options = lessons.filter('[data-content=' + id + ']');
            $('#lesson-select').html(options);
            $('#lesson-select').trigger('change');

        });

        if ($("#ori-select").val() != '')
        {

            id      = $("#ori-select").val();
            options = lessons.filter('[data-content=' + id + ']');
            $('#lesson-select').html(options);

        }
    </script>

@endsection
