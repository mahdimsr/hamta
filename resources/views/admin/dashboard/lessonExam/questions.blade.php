@extends('layouts.admin_dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title text-right">آزمون های درس به درس</h4>
                <p class="category text-right">تمامی آزمون های درس به درس</p>
                <a href="{{route('admin_ltlExams_addShow')}}" style="font-size: 12px;"
                   class="btn btn-info pull-right btn-table-header">
                    افزودن سوال جدید
                </a>
            </div>
            <div dir="rtl" class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead class="text-right">
                    <th>کد</th>
                    <th>عنوان</th>
                    <th>قیمت</th>
                    <th>پاسخ برگ</th>
                    <th>فرآیند</th>
                    </thead>
                    <tbody class="text-center">
                    @foreach($lessonExam as $exam)
                        <tr>
                            <td>{{$exam->exm}}</td>
                            <td>{{$exam->title}}</td>
                            <td>{{$exam->price/10 . ' تومان '}}</td>
                            <td>{{$exam->answerSheet ? 'دارد' : 'ندارد'}}</td>
                            <td>

                                <a href="{{route('admin_lExam_remove',['exm' => $exam->exm])}}" id="remove-btn"
                                   type="button"
                                   style="font-size: 12px;" class="btn btn-danger">
                                    حذف
                                </a>
                                <a href="{{route('admin_ltlExams_editShow',['exm' => $exam->exm])}}"
                                   style="font-size: 12px;" class="btn btn-info">
                                    ویرایش
                                </a>

                                <a href="{{route('admin_lExam_addQuizShow',['exm' => $exam->exm])}}"
                                   style="font-size: 12px;" class="btn btn-success">
                                    ویرایش یا درج سوال
                                </a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
