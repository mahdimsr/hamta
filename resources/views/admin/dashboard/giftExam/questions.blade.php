@extends('layouts.admin_dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                @if(\Illuminate\Support\Facades\Session::has('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>عملیات موفق!! </strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif

                <div class="header">
                    <h4 class="title text-right">سوالات آزمون</h4>
                    <a href="{{route('admin_giftExams_addQuestionShow',['exm' => $exam->exm])}}" style="font-size: 12px;"
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
                        @foreach($exam->questionExams as $questionExam)
                            <tr>
                                <td>{{$questionExam->question->text}}</td>
                                <td>{{$questionExam->question->gradeLesson->lesson_grade}}</td>
                                <td>

                                    <a href="{{ route('admin_giftExams_removeQuestion',['id' => $questionExam->id,'exm'=>$exam->exm]) }}"
                                       id="remove-btn"
                                       type="button" style="font-size: 12px;" class="btn btn-danger">
                                        حذف سوال از آزمون
                                    </a>
                                    <a href="{{ route('admin_giftExams_editQuestionShow',['id' => $questionExam->questionId,'exm'=>$exam->exm]) }}"
                                       style="font-size: 12px;" class="btn btn-info">
                                        ویرایش
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

@section('script')

    <script>

    </script>

@endsection
