@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">سوالات آزمون</h4>
					<a href="{{route('admin_lExam_addQuestionShow',['exm' => $exam->exm])}}" style="font-size: 12px;"
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
						@foreach($questions as $question)
							<tr>
								<td>{{$question->question->text}}</td>
								<td>{{$question->question->topicGradeLesson->gradeLesson->lesson_grade}}</td>
								<td>

									<a href="{{ route('admin_lExam_removeQuestion',['id' => $question->id]) }}" id="remove-btn"
									   type="button"
									   style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href=""
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
