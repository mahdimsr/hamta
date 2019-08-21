@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">درس ها</h4>
					<p class="category text-right">هر درسی که میتواند وجود داشته باشد</p>
					<a href="{{route('admin_lessons_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
						افزودن درس جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کد درس</th>
						<th>عنوان درس</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($lessons as $lesson)
							<tr>
								<td>{{$lesson->code}}</td>
								<td>{{$lesson->title}}</td>
								<td>

									<a href="{{route('admin_lessons_remove',['url' => $lesson->url])}}" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_lessons_editShow',['url' => $lesson->url])}}" style="font-size: 12px;" class="btn btn-info">
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