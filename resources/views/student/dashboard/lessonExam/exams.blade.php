@extends('layouts.student_dashboard')
@section('content')

    <div class="row" dir="rtl">
        @foreach($lessonExams as $lessonExam)
            <div class="col-md-4 col-sm-4">
                <div class="card text-center">
                    <div class="card-header"><h5 class="card-title">{{$lessonExam->title}}</h5></div>
                    <div class="hover14">
                        <figure>
                            <img class="" src="{{asset('image/student/dashboard/exam.jpg')}}" class="card-img-top"
                                 alt="" width="100%" height="200rem">
                        </figure>
                    </div>
                    <div class="card-body">
                        @if($lessonExam->description)
                            <h5 class="card-title">توضیحات</h5>
                            <p class="card-text margin-card">
                                {{$lessonExam->description}}
                            </p>
                        @endif
                        <p class="card-text margin-card">
                            {{$lessonExam->price/10 . ' تومان '}}
                        </p>

                        @if($lessonExam->isPaid())
                            <a href="{{ route('student_dashboard_lessonExams_questions') }}"
                               class="ctrl-standard typ-subhed fx-bubbleDown">
                                شرکت در آزمون
                            </a>
                        @else
                            <a href="{{ route('student_lessonExams_purchase',['exm' => $lessonExam->exm]) }}"
                               class="ctrl-standard typ-subhed fx-bubbleDown">
                                خرید آزمون
                            </a>
                        @endif
                    </div>
                    <div class="card-footer text-muteds text-center">
                        <p>{{$lessonExam->persianCreatedAt}} </p>
                        @foreach($lessonExam->grades() as $grade)
                            <p>{{$grade->title}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')

    <script type="text/javascript">
    </script>

@endsection

