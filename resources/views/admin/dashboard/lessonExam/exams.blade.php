@extends('admin.dashboard.layout')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">عنوان جدول</h4>
					<p class="category text-right">زیرنویس جدول</p>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کدآزمون</th>
						<th>عنوان آزمون</th>
						<th>قیمت</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($lessonExam as $exam)
							<tr>
								<td>{{$exam->exm}}</td>
								<td>{{$exam->title}}</td>
								<td>{{$exam->price/10 . ' تومان '}}</td>
								<td>

									<button onclick="onRemoveClick('{{$exam->exm}}');" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</button>
									<a href="#" style="font-size: 12px;" class="btn btn-info">
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