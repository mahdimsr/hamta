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
                        تعداد سوالات آزمون <b>{{ count($exam->questionExams) }}</b>
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
                    <form method="post" action="{{route('addQuestion')}}" enctype="multipart/form-data">

                        {{csrf_field()}}

                        <input name="exm" value="{{$exam->exm}}" hidden>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>سرفصل سوال</label>
                                    <select dir="rtl" name="topicGradeLesson" id="topic-select" class="form-control">
                                        <option value="" id="0" selected disabled>سرفصل سوال را انتخاب نمایید</option>
                                        @foreach ( $topics as $topic )
                                                <option
                                                    id="{{ $topic->gradeLessonId }}"
                                                    value="{{ $topic->id }}">{{ $topic->topic->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('topic') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>دسته بندی درس ها</label>
                                    <select dir="rtl" name="gradeLesson" id="gradeLesson-select" class="form-control">
                                        <option value="" id="0" selected disabled>گرایش و درس سوال را انتخاب نمایید</option>
                                        @foreach ( $lessons as $lesson )
                                            <option
                                                value="{{ $lesson->id }}">{{ $lesson->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('gradeLesson') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>درجه سختی سوال</label>
                                    <select dir="rtl" name="hardness" class="form-control">
                                        <option selected disabled>درجه سختی سوال را انتخاب نمایید</option>
                                        <option value="1" {{old('hardness') == '1' ? 'selected' : ''}}>خیلی ساده
                                        </option>
                                        <option value="2" {{old('hardness') == '2' ? 'selected' : ''}}>ساده</option>
                                        <option value="3" {{old('hardness') == '3' ? 'selected' : ''}}>معمولی</option>
                                        <option value="4" {{old('hardness') == '4' ? 'selected' : ''}}>سخت</option>
                                        <option value="5" {{old('hardness') == '5' ? 'selected' : ''}}>حیل سحت</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('hardness') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نوع سوال</label>
                                    <select dir="rtl" name="typeId" class="form-control">
                                        <option selected disabled>نوع سوال را انتخاب نمایید</option>
                                        @foreach ( $questionTypes as $questionType )
                                            <option id="{{$questionType->categoryId}}"
                                                    value="{{ $questionType->id }}">{{ $questionType->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('topic') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>صورت سوال</label>
                                    <textarea dir="rtl" name="text" rows="3" class="form-control"
                                              placeholder="صورت سوال را بنویسید">{{old('text')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>گزینه چهارم</label>
                                    <input name="optionFour" dir="rtl" type="text" class="form-control"
                                           value="{{old('optionFour')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>گزینه سوم</label>
                                    <input name="optionThree" dir="rtl" type="text" class="form-control"
                                           value="{{old('optionThree')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>گزینه دوم</label>
                                    <input name="optionTwo" dir="rtl" type="text" class="form-control"
                                           value="{{old('optionTwo')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>گزینه اول</label>
                                    <input name="optionOne" dir="rtl" type="text" class="form-control"
                                           value="{{old('optionOne')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill btn-info">ذخیره و درج سوال بعدی</button>
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
                                        <option disabled selected>گزینه صحیح رو انتخاب کنید</option>
                                        <option value="1">گزینه اول</option>
                                        <option value="2">گزینه دوم</option>
                                        <option value="3">گزینه سوم</option>
                                        <option value="4">گزینه چهارم</option>
                                    </select>
                                </div>
                                <div class="is-invalid">
                                    <small>{{$errors->first('answer')}}</small>
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

@section('script')
    <script>
    var id,options;
    var topics   = $('#topic-select option').clone();

    $("#gradeLesson-select").change(function()
    {
        id = $("#gradeLesson-select").val();
        options = topics.filter('[id=' + id + '],[id=0]');
        $('#topic-select').html(options);
        $('#topic-select').prop('selectedIndex',0).trigger('change');

    });

    if($("#gradeLesson-select").val()!='')
    {

        id = $("#gradeLesson-select").val();
        options = topics.filter('[id=' + id + '],[id=0]');
        $('#topic-select').html(options);

    }
    </script>
@endsection
