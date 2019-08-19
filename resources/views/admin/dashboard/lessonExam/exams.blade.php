@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">عنوان جدول</h4>
					<p class="category text-right">زیرنویس جدول</p>
					<a href="{{route('admin_ltlExams_addShow')}}" style="font-size: 12px;" class="btn btn-info">
						افزودن آزمون جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کدمقطع</th>
						<th>عنوان مقطع</th>
						<th>قیمت مقطع</th>
						<th>پاسخ برگ</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($lessonExam as $exam)
							<tr>
								<td>{{$exam->code}}</td>
								<td>{{$exam->title}}</td>
								<td>{{$exam->price/10 . ' تومان '}}</td>
								<td>{{$exam->answerSheet ? 'دارد' : 'ندارد'}}</td>
								<td>

									<a href="{{route('admin_grades_remove',['url' => $exam->code])}}" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_grades_editShow',['url' => $exam->code])}}" style="font-size: 12px;" class="btn btn-info">
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
