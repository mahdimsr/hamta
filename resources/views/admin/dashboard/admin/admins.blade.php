@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">ادمین ها</h4>
					<p class="category text-right">شما فقط ادمین هایی را میتوانید مشاهده کنید که سطح دسترسی پایین تر از شما دارند</p>
					<a href="{{route('admin_admins_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
						افزودن ادمین جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>نام کامل ادمین</th>
						<th>نام کاربری ادمین</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($admins as $admin)
							<tr>
								<td>{{$admin->fullName}}</td>
								<td>{{$admin->username}}</td>
								<td>

									<a href="{{route('admin_grades_remove',['url' => $admin->username])}}" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_admins_editShow',['username' => $admin->username])}}" style="font-size: 12px;" class="btn btn-info">
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
