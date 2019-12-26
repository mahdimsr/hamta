@extends('layouts.admin_dashboard')

@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="card cards">
                <div class="card-header" id="nomargin1">
                    <h4 class="title text-right ">مشخصات آزمون</h4>
                    <a href="{{route('admin_ltlExams')}}" class="btn btn-info"><span class="fas fa-arrow-left"></span> بازگشت</a>
                </div>
                <div dir="rtl" class="content ">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="image hover-bright" src="{{asset('image/admin/dashboard/exam.jpg')}}"
                                 width="100%" height="100%">

                        </div>
                        <div class="col-md-7" id="col-right">
                            <div class="row">
                                <div class="col-md-3 col-sm-3" style="float: right;">
                                    <p> عنوان آزمون: {{$exam->title}}</p>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <p> کد آزمون: {{$exam->exm}}</p>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <p> درس های آزمون:
                                        @foreach($exam->lessons() as $lesson)
                                            {{$lesson->title}}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-3 col-sm-3" style="float: right;">
                                    <p> گرایش آزمون:
                                        {{$exam->orientation()->title}}
                                    </p>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <p> تاریخ درج:
                                    {{$exam->persianCreatedAt}}</p>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <p> مقاطع تحصیلی آزمون:
                                        @foreach($exam->grades() as $grade)
                                            {{$grade->title}}
                                        @endforeach
                                    </p>
                                </div>
                            </div>


                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-3" style="float: right;">
                                    <p> قیمت:
                                    {{$exam->price}} تومان</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <p class="text-muted"> آخرین بروزرسانی: {{$exam->persianUpdatedAt}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-right">سوالات آزمون</h4>
                    <a href="{{route('admin_ltlExams_addQuestionShow',['exm' => $exam->exm])}}" style="font-size: 12px;"
                       class="btn btn-info pull-right btn-table-header">
                        افزودن سوال جدید
                    </a>
                </div>
                <div dir="rtl" class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead class="text-right">
                        <th>متن سوال</th>
                        <th>عنوان درس</th>
                        <th>فرآیند</th>
                        </thead>
                        <tbody class="text-center">
                        @foreach($questionExams as $questionExam)
                            <tr>
                                <td>{{$questionExam->question->text}}</td>
                                <td>{{$questionExam->question->gradeLesson->lesson_grade}}</td>
                                <td>

                                    <button data-modal-trigger="remove-modal"
                                            data-remove-route="{{ route('admin_ltlExams_removeQuestion',['id' => $questionExam->id,'exm'=>$exam->exm]) }}"
                                            class="trigger btn btn-danger" style="font-size: 12px;">

                                        حذف
                                    </button>
                                    <a href="{{ route('admin_ltlExams_editQuestionShow',['id' => $questionExam->questionId , 'exm' => $exam->exm]) }}"
                                       style="font-size: 12px;" class="btn btn-info">
                                        ویرایش
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div data-modal="remove-modal" class="modal">
                    <article class="content-wrapper">
                        <button class="close"></button>
                        <header class="modal-header">
                            <h2>حذف سوال آزمون</h2>
                        </header>
                        <div class="content"  dir="rtl">
                            <p>آیا مایل هستید  سوال آزمون درس به درس ایجاد شده حذف شود؟</p>
                        </div>
                        <footer class="modal-footer">
                            <a class="action">بله</a>
                            <button class="action" id="close">خیر</button>
                        </footer>
                    </article>
                </div>
            </div>
        </div>
    </div>

@endsection
