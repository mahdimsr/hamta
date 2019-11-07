@extends('layouts.content')

@section('link')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="stylesheet" href="{{ asset('css/student/dashboard/exam-questions.css') }}">

@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h3>این قسمت مربوط به توضیحات ازمون می باشد</h3>
        </div>
    </div>
    <hr>

    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
             aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
    </div>

    <form action="{{route('student_dashboard_lessonExams_questionsCorrect')}}" method="post">

        {{csrf_field()}}

        <div style="display: none">
            {{$i=0}}
        </div>

        @foreach($questions as $question)

            <in class="list-group list-group-flush">
                <li class="list-group-item active">
                    <p>{{$question->text}}</p>
                </li>

                <div style="display: none">
                    {{$i++}}
                </div>

                <input name="{{'questions[' . $i . '][id]' }}" value="{{$question->id}}" type="text"
                       style="display: none">

                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio1' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="1"
                               type="radio"/>
                        <label for="{{'radio1' . $question->id}}">{{$question->optionOne}}</label>
                    </div>
                </li>


                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio2' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="2"
                               type="radio"/>
                        <label for="{{'radio2' . $question->id}}">{{$question->optionTwo}}</label>
                    </div>
                </li>


                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio3' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="3"
                               type="radio"/>
                        <label for="{{'radio3' . $question->id}}">{{$question->optionThree}}</label>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="inputGroup">
                        <input id="{{'radio4' . $question->id}}" name="{{'questions[' . $i . ']' . '[answer]' }}"
                               value="4"
                               type="radio"/>
                        <label for="{{'radio4' . $question->id}}">{{$question->optionFour}}</label>
                    </div>
                </li>

            </in>

        @endforeach

        <button type="submit" class="btn btn-info btn-fill pull-right">اتمام</button>
        <div class="clearfix"></div>

    </form>

@endsection


@section('script')


@endsection


