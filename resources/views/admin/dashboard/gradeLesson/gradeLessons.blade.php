@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">درس های هرپایه</h4>
					<p class="category text-right">زیرنویس جدول</p>
					<a href="{{route('admin_gradeLessons_addShow')}}" style="font-size: 12px;" class="btn btn-info">
						افزودن درس جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>عنوان درس</th>
						<th>مقطع و گرایش</th>
						<th>کد درس</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($gradeLessons as $gradeLesson)
							<tr>
								<td>{{$gradeLesson->lesson->title}}</td>
								<td>{{$gradeLesson->grade->title .' - '. $gradeLesson->orientation->title}}</td>
								<td>{{$gradeLesson->code}}</td>
								<td>

									<a href="{{route('admin_gradeLessons_remove',['code' => $gradeLesson->code])}}" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_gradeLessons_editShow',['code' => $gradeLesson->code])}}" style="font-size: 12px;" class="btn btn-info">
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