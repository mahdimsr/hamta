@extends('layouts.admin_dashboard')

@section('content')



	<div class="row">
		<div class="col-md-12">
			<div class="card cards">
				<div class="card-header" id="nomargin1">
							<h4 class="title text-right ">مشخصات آزمون</h4>
					</div>
				<div dir="rtl" class="content ">
					<div class="row">
					<div class="col-md-3">
						<img class="image hover-bright" src="{{asset('image/admin/dashboard/exam.jpg')}}" width="100%" height="100%">

					</div>
					<div class="col-md-7" id="col-right">
					<div  class="row">
						<div class="col-md-3 col-sm-3" style="float: right;">
						<p>عنوان آزمون:</p>
						</div>
						<div class="col-md-3 col-sm-3">
							<p>کد آزمون:</p>
						</div>
						<div class="col-md-5 col-sm-5">
							<p>درس های آزمون:</p>
						</div>
					</div>
						<div  class="row" style="margin-top: 20px;">
							<div class="col-md-3 col-sm-3" style="float: right;">
								<p>گرایش آزمون:</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<p>تاریخ درج:</p>
							</div>
							<div class="col-md-5 col-sm-5" >
								<p>مقاطع تحصیلی آزمون:</p>
							</div>

							{{--<div class="col-md-3">--}}
								{{--<p>قیمت:</p>--}}
							{{--</div>--}}

						</div>


						<div  class="row" style="margin-top: 20px;">
							<div class="col-md-3" style="float: right;">
								<p>قیمت:</p>
							</div>




						</div>
					</div>
					</div>
				</div>
				<div class="card-footer text-right">
					<p class="text-muted">:آخرین بروزرسانی</p>
				</div>
			</div>
		</div>
	</div>

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
						@foreach($questionExams as $questionExam)
							<tr>
								<td>{{$questionExam->question->text}}</td>
								<td>{{$questionExam->question->gradeLesson->lesson_grade}}</td>
								<td>

									<a href="{{ route('admin_lExam_removeQuestion',['id' => $questionExam->id]) }}" id="remove-btn"
									   type="button"
									   style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
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
			</div>
		</div>
	</div>
@endsection

@section('script')

	<script>

	</script>

@endsection
