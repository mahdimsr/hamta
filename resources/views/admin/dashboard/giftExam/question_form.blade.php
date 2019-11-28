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
                    <h4 class="title">{{$modify==0? 'افزودن سوال برای آزمون' : 'ویرایش سوال آزمون' }}</h4>
                </div>

                <div class="content">
                    <form method="post"
                          action="{{ $modify==0 ?  route('admin_giftExams_addQuestion',['exm' => $exam->exm]) : route('admin_giftExams_editQuestion',['exm' => $exam->exm ,'id' => $question->id])}}"
                          enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="row">

                            <div class="col-md-6 s-floatR">
                                <div class="form-group">
                                    <label>درس سوال</label>
                                    <select dir="rtl" name="gradeLesson"
                                            class="form-control menu hide-search dropdown-radius" {{ $modify==1? 'disabled' : '' }} tabindex="1">
                                        <option value="" id="0" selected disabled>درس سوال را انتخاب نمایید</option>
                                        @foreach ( $exam->gradeLessons as $gradeLesson )
                                            <option
                                                value="{{ $gradeLesson->id }}" {{ old('gradeLesson')== $gradeLesson->id ? 'selected' : '' }} {{ $modify==1 && !old('gradeLesson') && $question->gradeLessonId==$gradeLesson->id ? 'selected' : '' }}>{{ $gradeLesson->lesson_grade}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('gradeLesson') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 s-floatL">
                                <div class="form-group">
                                    <label>مباحث سوال</label>
                                    <input name="description" dir="rtl" type="text" class="form-control "
                                           placeholder="مباحث سوال را وارد نمایید"
                                           value="{{old('description')}}{{ $modify==1 && !old('description') && $question->description ? $question->description : '' }}" tabindex="2">
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('description') }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 s-floatR">
                                <div class="form-group">
                                    <label>نوع سوال</label>
                                    <input name="questionType" dir="rtl" type="text" class="form-control"
                                           placeholder="نوع سوال را وارد نمایید"
                                           value="{{old('questionType')}}{{ $modify==1 && !old('questionType') && $question->questionType ? $question->questionType : '' }}" tabindex="3">
                                </div>
                            </div>

                            <div class="col-md-6 s-floatL">
                                <div class="form-group">
                                    <label>درجه سختی سوال</label>
                                    <select dir="rtl" name="hardness" class="form-control menu hide-search dropdown-radius" tabindex="4">
                                        <option value="" selected disabled>درجه سختی سوال را انتخاب نمایید</option>
                                        <option
                                            value="1" {{old('hardness') == '1' ? 'selected' : ''}}{{ $modify==1 && !old('hardness') && $question->hardness== '1' ? 'selected' : '' }}>
                                            خیلی ساده
                                        </option>
                                        <option
                                            value="2" {{old('hardness') == '2' ? 'selected' : ''}} {{ $modify==1 && !old('hardness') && $question->hardness== '2' ? 'selected' : '' }}>
                                            ساده
                                        </option>
                                        <option
                                            value="3" {{old('hardness') == '3' ? 'selected' : ''}} {{ $modify==1 && !old('hardness') && $question->hardness== '3' ? 'selected' : '' }}>
                                            معمولی
                                        </option>
                                        <option
                                            value="4" {{old('hardness') == '4' ? 'selected' : ''}} {{ $modify==1 && !old('hardness') && $question->hardness== '4' ? 'selected' : '' }}>
                                            سخت
                                        </option>
                                        <option
                                            value="5" {{old('hardness') == '5' ? 'selected' : ''}} {{ $modify==1 && !old('hardness') && $question->hardness== '5' ? 'selected' : '' }}>
                                            خیلی سخت
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('hardness') }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>صورت سوال</label>
                                    <textarea dir="rtl" name="text" rows="4" class="form-control textarea-radius" tabindex="5"
                                              placeholder="صورت سوال را وارد نمایید">{{old('text')}}{{ $modify==1 && !old('text') && $question->text ? $question->text : '' }}</textarea>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('text') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 s-floatR">
                                <div class="form-group">
                                    <label>گزینه اول</label>
                                    <textarea dir="rtl" name="optionOne" rows="3" class="form-control textarea-radius" tabindex="6"
                                              placeholder="گزینه اول سوال را وارد نمایید">{{old('optionOne')}}{{ $modify==1 && !old('optionOne') && $question->optionOne ? $question->optionOne : '' }}</textarea>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('optionOne') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 s-floatL">
                                <div class="form-group">
                                    <label>گزینه دوم</label>
                                    <textarea dir="rtl" name="optionTwo" rows="3" class="form-control textarea-radius" tabindex="7"
                                              placeholder="گزینه دوم سوال را وارد نمایید">{{old('optionTwo')}}{{ $modify==1 && !old('optionTwo') && $question->optionTwo ? $question->optionTwo : '' }}</textarea>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('optionTwo') }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 s-floatR">
                                <div class="form-group">
                                    <label>گزینه سوم</label>
                                    <textarea dir="rtl" name="optionThree" rows="3" class="form-control textarea-radius" tabindex="8"
                                              placeholder="گزینه سوم سوال را وارد نمایید">{{old('optionThree')}}{{ $modify==1 && !old('optionThree') && $question->optionThree ? $question->optionThree : '' }}</textarea>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('optionThree') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 s-floatL">
                                <div class="form-group">
                                    <label>گزینه چهارم</label>
                                    <textarea dir="rtl" name="optionFour" rows="3" class="form-control textarea-radius" tabindex="9"
                                              placeholder="گزینه چهارم سوال را وارد نمایید">{{old('optionFour')}}{{ $modify==1 && !old('optionFour') && $question->optionFour ? $question->optionFour : '' }}</textarea>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('optionFour') }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-4 s-floatR">
                                <div class="form-group">
                                    <label>گزینه صحیح</label>
                                    <select dir="rtl" name="answer" class="form-control  menu dropdown-radius hide-search" tabindex="10">
                                        <option value="" disabled selected>گزینه صحیح را انتخاب نمایید</option>
                                        <option
                                            value="1" {{old('answer') == '1' ? 'selected' : ''}}{{ $modify==1 && !old('answer') && $question->answer== '1' ? 'selected' : '' }}>
                                            گزینه اول
                                        </option>
                                        <option
                                            value="2" {{old('answer') == '2' ? 'selected' : ''}}{{ $modify==1 && !old('answer') && $question->answer== '2' ? 'selected' : '' }}>
                                            گزینه دوم
                                        </option>
                                        <option
                                            value="3" {{old('answer') == '3' ? 'selected' : ''}}{{ $modify==1 && !old('answer') && $question->answer== '3' ? 'selected' : '' }}>
                                            گزینه سوم
                                        </option>
                                        <option
                                            value="4" {{old('answer') == '4' ? 'selected' : ''}}{{ $modify==1 && !old('answer') && $question->answer== '4' ? 'selected' : '' }}>
                                            گزینه چهارم
                                        </option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    <small>{{ $errors->first('answer') }}</small>
                                </div>
                            </div>
                            <div class="col-md-4 s-floatR">
                                <div class="form-group">
                                    <label>عکس برای سوال (در صورت نیاز)</label>
                                    <div class="input-file-container">
                                        <input class="input-file" name="photo" id="my-file" type="file" tabindex="11"
                                        >
                                        <label for="my-file" class="input-file-trigger text-center">
                                            {{$modify == 1 && $question->photo ? 'ویرایش عکس سوال' : 'آپلود عکس سوال'}}
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('photo') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 s-floatL">
                                <div class="form-group">
                                    <label>عکس پاسخ تشریحی سوال</label>
                                    <div class="input-file-container">
                                        <input class="input-file" name="answerImage" id="my-file" type="file" tabindex="12">

                                        <label tabindex="0" for="my-file" class="input-file-trigger text-center">
                                            {{$modify == 1 && $question->answerImage ? 'ویرایش پاسخ تشریحی سوال' : 'آپلود پاسخ تشریحی سوال'}}
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">
                                        <small>{{ $errors->first('answerImage') }}</small>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <button type="submit"
                                class="btn btn-fill btn-info pull-left" tabindex="14">{{ $modify== 0 ? 'ذخیره و درج سوال بعدی' : 'ویرایش سوال' }}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection
