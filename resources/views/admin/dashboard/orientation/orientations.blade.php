@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">گرایش ها</h4>
					<a href="{{route('admin_orientations_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
						افزودن گرایش جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کد گرایش</th>
						<th>عنوان گرایش</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($orientations as $orientation)
							<tr>
								<td>{{$orientation->code}}</td>
								<td>{{$orientation->title}}</td>
								<td>

									<a href="{{route('admin_orientations_remove',['id' => $orientation->id])}}" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_orientations_editShow',['id' => $orientation->id])}}" style="font-size: 12px;" class="btn btn-info">
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
