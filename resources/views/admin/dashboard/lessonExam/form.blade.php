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
            <div class="card ">
                <div class="header ">
                    <h4 class="title">افزودن آزمون درس به درس</h4>
                </div>

                <div class="content">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn1 btn-circle   ">1</a>
                                <p>بخش 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn1 btn-circle">2</a>
                                <p>بخش 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn1 btn-circle">3</a>
                                <p>بخش 3</p>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{route('admin_lExam_add')}}" role="form" enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <h3 class="">بخش اول </h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">قیمت</label>
                                            <input name="price" class="form-control" type="text"
                                                   maxlength="10" tabindex="2"
                                                   value="{{old('price')}}"
                                                   placeholder="مثلا: 5000 تومان"/>
                                        </div>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('price') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">نام</label>
                                            <input name="title" class="form-control" type="text"
                                                   maxlength="20" tabindex="1" value="{{old('title')}}">
                                        </div>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('title') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">پاسخ نامه سوالات (به صورت pdf)</label>
                                            <input name="answerSheet" class="form-control" type="file" accept="application/pdf"
                                                   maxlength="10" tabindex="5"
                                                   value="{{old('answerSheet')}}"/>
                                        </div>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('duration') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">زمان آزمون (به دقیقه)</label>
                                            <input name="duration" class="form-control" type="text"
                                                   maxlength="10" tabindex="4"
                                                   value="{{old('duration')}}"
                                                   placeholder="مثلا: 60 دقیقه"/>
                                        </div>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('duration') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تاریخ فعال شدن آزمون </label>
                                            <input dir="rtl" id="activeDate" name="activeDate" type="text"
                                                   class="form-control"
                                                   tabindex="3">
                                            <div class="invalid-feedback">
                                                <small>{{ $errors->first('activeDate') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">توضیحات</label>
                                            <textarea name="description" class="form-control" type="text"
                                                      tabindex="5">{{old('description')}}</textarea>
                                        </div>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('description') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <button class="ctrl-standard typ-subhed fx-bubbleDown nextBtn  pull-right"
                                        type="button">بعدی
                                </button>
                            </div>
                        </div>

                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-12">
                                <h3> Step 2</h3>
                                <div class="col-md-4">
                                    <label class="control-label">پایه</label>
                                    <select name="grade" class="form-control" id="grade-select">
                                        <option id="0" disabled selected>پایه آزمون را انتخاب کنید</option>
                                        @foreach($grades as $grade)
                                            <option id="{{$grade->id}}"
                                                    value="{{$grade->id}}"
                                                {{old('grade') == $grade->id ? 'selected' : ''}}>
                                                {{$grade->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('grade') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">گرایش</label>
                                    <select name="orientation" class="form-control" id="ori-select">
                                        <option id="0" disabled selected>گرایش آزمون را انتخاب کنید</option>
                                        @foreach($orientations as $orientation)
                                            <option id="{{$orientation->id}}"
                                                    value="{{$orientation->id}}"
                                                {{old('orientation') == $orientation->id ? 'selected' : ''}}>
                                                {{$orientation->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('orientation') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">گروه درسی</label>
                                        <select name="category" class="form-control" id="cat-select">
                                            <option id="0" disabled selected>گروه درسی آزمون را انتخاب کنید</option>
                                            @foreach($categories as $category)
                                                <option id="{{$category->id}}"
                                                        value="{{$category->id}}"
                                                    {{old('category') == $category->id ? 'selected' : ''}}>
                                                    {{$category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('category') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-left" type="button">بعدی</button>
                            </div>
                        </div>

                        <div class="row setup-content" id="step-3">
                            <div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">نحوه ایجاد آزمون</label>
                                        <input name="itemType" type="radio" class="form-control" value="LESSON"
                                            {{old('itemType') == 'LESSON' ? 'checked' : ''}}>
                                        <input name="itemType" type="radio" class="form-control" value="TOPIC"
                                            {{old('itemType') == 'TOPIC' ? 'checked' : ''}}>
                                    </div>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('itemType') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">

                                <div id="grade-div" class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">درس های آزمون</label>
                                        <select name="gradeLessons[]" class="form-control" id="gradeLesson-select">
                                            <option id="0" disabled selected>گروه درسی آزمون را انتخاب کنید</option>
                                            @foreach($gradeLessons as $gradeLesson)
                                                <option
                                                    id="{{$gradeLesson->orientationCategory->categoryId.$gradeLesson->orientationCategory->orientationId.$gradeLesson->gradeId}}"
                                                    value="{{$gradeLesson->id}}"
                                                    {{old('gradeLessons') == $gradeLesson->id ? 'selected' : ''}}>
                                                    {{$gradeLesson->lesson->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('gradeLessons') }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div id="topic-div" class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">سرفصل ها</label>
                                        <select name="topics[]" class="form-control" id="topic-select">
                                            <option id="0" disabled selected>سرفصل های درسی آزمون را انتخاب کنید
                                            </option>
                                            @foreach($topicGradeLessons as $topicGradeLesson)
                                                <option
                                                    id="{{$topicGradeLesson->gradeLessonId}}"
                                                    value="{{$topicGradeLesson->id}}"
                                                    {{old('topics') == $topicGradeLesson->id ? 'selected' : ''}}>
                                                    {{$topicGradeLesson->topic->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('topics') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">درس</label>
                                        <select name="gradeLesson" class="form-control" id="lesson-select">
                                            <option id="0" disabled selected>گروه درسی آزمون را انتخاب کنید</option>
                                            @foreach($gradeLessons as $gradeLesson)
                                                <option
                                                    id="{{$gradeLesson->orientationCategory->categoryId.$gradeLesson->orientationCategory->orientationId.$gradeLesson->gradeId}}"
                                                    value="{{$gradeLesson->id}}"
                                                    {{old('gradeLessons') == $gradeLesson->id ? 'selected' : ''}}>
                                                    {{$gradeLesson->lesson->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            <small>{{ $errors->first('gradeLesson') }}</small>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">ثبت</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')

    <script>

        $('#activeDate').pDatepicker({

            autoClose: true,
            initialValue: true,
            format: 'YYYY/MM/DD',
            responsive: true,
            toolbox: {
                calendarSwitch: {
                    enabled: false
                },
                submitButton:{enabled:true},
                todayButton:{
                    enabled:false
                }
            }
        });

        var categories   = $('#cat-select option').clone();
        var orientations = $('#ori-select option').clone();
        var grades       = $('#grade-select option').clone();
        var gradeLessons = $('#gradeLesson-select option').clone();
        var lessons      = $('#lesson-select option').clone();

        var topics = $('#topic-select option').clone();

        $('input[type=radio][name=itemType]').change(function ()
        {
            if (this.value == 'LESSON')
            {
                $('#grade-div').css('display', 'block');
                $('#topic-div').css('display', 'none');
            } else if (this.value == 'TOPIC')
            {
                $('#grade-div').css('display', 'none');
                $('#topic-div').css('display', 'block');
            }
        });


        function lessonFilter()
        {
            var catId   = $('#cat-select').val();
            var oriId   = $('#ori-select').val();
            var gradeId = $('#grade-select').val();

            id = catId + '' + oriId + gradeId;

            options      = gradeLessons.filter('[id=' + id + '],[id=0]');
            lessonOption = lessons.filter('[id=' + id + '],[id=0]');

            console.log(id);

            $('#gradeLesson-select').html(options);
            $('#gradeLesson-select').prop('selectedIndex', 0).change();

            $('#lesson-select').html(lessonOption);
            $('#lesson-select').prop('selectedIndex', 0).change();

            console.log(id);
        }


        function topicFilter()
        {
            var gradeLessonId = $('#lesson-select').val();

            options = topics.filter('[id=' + gradeLessonId + '],[id=0]');

            $('#topic-select').html(options);
            $('#topic-select').prop('selectedIndex', 0).change();


        }


        $('#cat-select').change(function ()
        {
            lessonFilter()
        });


        $('#ori-select').change(function ()
        {
            lessonFilter()
        });


        $('#grade-select').change(function ()
        {
            lessonFilter()
        });


        $('#lesson-select').change(function ()
        {
            topicFilter()
        });


    </script>

@endsection
