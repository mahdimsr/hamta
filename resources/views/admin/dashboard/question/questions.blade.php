@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">مقاطع تحصیلی</h4>
					<p class="category text-right"></p>
					<a href="{{route('admin_grades_addShow')}}" style="font-size: 12px;"
					   class="btn btn-info pull-right btn-table-header">
						افزودن مقطع جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">

					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کدمقطع</th>
						<th>عنوان مقطع</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">

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