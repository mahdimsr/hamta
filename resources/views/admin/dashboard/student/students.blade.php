@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">عنوان جدول</h4>
					<p class="category text-right">زیرنویس جدول</p>
					<a href="{{route('admin_grades_addShow')}}" style="font-size: 12px;" class="btn btn-info">
						افزودن مقطع جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>نام و نام خانوادگی</th>
						<th>مقطع،گرایش</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($students as $student)
							<tr>
								<td>{{$student->name . ' ' . $student->familyName}}</td>
								<td>{{$student->grade->title . ' ' . $student->orientation->title}}</td>
								<td>
									<a href="{{route('admin_students_editShow',['nationalCode' => $student->nationalCode])}}"
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