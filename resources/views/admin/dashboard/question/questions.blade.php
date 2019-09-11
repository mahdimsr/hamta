@extends('layouts.admin_dashboard')

@section('content')


	<div class="card">
		<section class="search-sec text-right">

			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
							<input dir="rtl" type="text" class="form-control search-slt" placeholder="">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
							<input dir="rtl" type="text" class="form-control search-slt" placeholder="درس مورد نظر">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
							<select dir="rtl" class="form-control search-slt" id="exampleFormControlSelect1">
								<option>مقطع</option>
								<option>Example one</option>
								<option>Example one</option>
								<option>Example one</option>
								<option>Example one</option>
								<option>Example one</option>
								<option>Example one</option>
							</select>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
							<button type="button" class="btn btn-info wrn-btn">جست و جو</button>

							<a href="{{route('show_addQuestion')}}"
							   class="btn btn-info wrn-btn align-self-center" style="margin-top: 10px">افزودن سوال
								جدید</a>
						</div>
					</div>
				</div>
			</div>

		</section>

	</div>

	<form method="post" action="{{isset($exam) ? route('admin_ltl_add_many_question') : '#'}}">

		{{csrf_field()}}

		@if(isset($exam))
			<input name="exm" value="{{$exam->exm}}" type="hidden">
		@endif

		@foreach($questions as $question)


			<div dir="rtl" class="row">
				<div class="col-md-1">
					<label class="label" style="font-size: 130%">
						<input name="questionId[]" value="{{$question->id}}"
							   @if(isset($exam))
							   @foreach($exam->questionExams as $questionExam)
							   {{$questionExam->questionId == $question->id ? 'checked' :''}}
							   @endforeach
							   @endif
							   class="label__checkbox" type="checkbox"/>
						<span class="label__text">
      						<span class="label__check">
       							 <i class="fa fa-check icon"></i>
							</span>
    					</span>
					</label>
				</div>

				<div class="col-md-11">
					<div class="card">
						<div class="header">
							<h4 class="title text-right"></h4>
						</div>
						<div class="card-body">
							<div dir="rtl" class="row text-right " style="margin: 0px;">
								<div class="col-md-9 col-lg-10" style="float: right">
									<p>{{$question->text}}</p>

									<ul class="answers">
										<li><p>{{$question->optionOne}}</p></li>
										<li><p>{{$question->optionTwo}}</p></li>
										<li><p>{{$question->optionThree}}</p></li>
										<li><p>{{$question->optionFour}}</p></li>
									</ul>

								</div>
								<div class="col-md-2 " style="float: right;">
									<a href="#"> <img class="question-img"
													  src="{{asset('image/admin/dashboard/test.png')}}"
													  width="120px" height="100px"></a>
								</div>


							</div>

						</div>
						<div class="card-footer text-muted text-center">
							<p>{{$question->gradeLesson->title . '.' . 'سطح سختی: ' . $question->hardnessLabel}}</p>
						</div>
					</div>
				</div>

			</div>

		@endforeach

		{{ $questions->links() }}

		@if(isset($exam))
			<button type="submit" class="btn btn-fill btn-info">درج سوال</button>
		@endif

	</form>

@endsection

@section('script')

	<script>

		function onRemoveClick(exm)
		{

			$.ajax({

				type: 'POST',

				url: '{{action('Admin\\Dashboard\\LessonExamController@remove')}}',

				data: {exm: exm},

				dataType: 'JSON',

				success: function()
				{

					console.log(exm);

				}

			});
		}

	</script>

@endsection
