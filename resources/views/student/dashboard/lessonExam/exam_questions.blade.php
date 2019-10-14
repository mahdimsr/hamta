@extends('layouts.student_dashboard')

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


    @foreach($questions as $question)

        <ul class="list-group list-group-flush">
            <li class="list-group-item active">
                <p>{{$question->text}}</p>
            </li>


            <li class="list-group-item">
                <div class="inputGroup">
                    <input id="radio1" name="{{'questionAnswer-' . $question->id}}" type="radio"/>
                    <label for="radio1">{{$question->optionOne}}</label>
                </div>
            </li>


            <li class="list-group-item">
                <div class="inputGroup">
                    <input id="radio2" name="{{'questionAnswer-' . $question->id}}" type="radio"/>
                    <label for="radio2">{{$question->optionTwo}}</label>
                </div>
            </li>


            <li class="list-group-item">
                <div class="inputGroup">
                    <input id="radio3" name="{{'questionAnswer-' . $question->id}}" type="radio"/>
                    <label for="radio3">{{$question->optionThree}}</label>
                </div>
            </li>

            <li class="list-group-item">
                <div class="inputGroup">
                    <input id="radio4" name="{{'questionAnswer-' . $question->id}}" type="radio"/>
                    <label for="radio4">{{$question->optionFour}}</label>
                </div>
            </li>

        </ul>

    @endforeach


@endsection


@section('script')


@endsection


