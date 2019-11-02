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
                            {{$lessonExam->price . ' تومان '}}
                        </p>

                        @if($lessonExam->hasInCart() && !$lessonExam->hasPurchased())
                            <button class="ctrl-standard typ-subhed fx-bubbleDown">
                                در لیست خرید موجود است
                            </button>
                        @elseif($lessonExam->hasPurchased())
                        <button class="ctrl-standard typ-subhed fx-bubbleDown">
                            <a href="{{ route('student_dashboard_lessonExams_questions',['exm' => $lessonExam->exm]) }}">
                                شرکت در آزمون
                            </a>
                        </button>
                        @else
                            <button class="ctrl-standard typ-subhed fx-bubbleDown">
                                <a href="{{ route('student_dashboard_lessonExams_addToCart',['exm' => $lessonExam->exm]) }}">
                                    افزودن به لیست خرید
                                </a>
                        </button>
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

