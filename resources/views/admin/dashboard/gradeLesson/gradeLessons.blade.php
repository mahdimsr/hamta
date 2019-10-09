@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">دروس مختص هر پایه</h4>
					<a href="{{route('admin_gradeLessons_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
						افزودن درس جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-center">
						<th>ردیف</th>
						<th>کد درس</th>
                        <th>توضیحات</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($gradeLessons as $gradeLesson)
							<tr>
								<td>{{$gradeLesson->id}}</td>
								<td>{{$gradeLesson->code}}</td>
								<td>{{$gradeLesson->title}}</td>
								<td>

									<a href="{{route('admin_gradeLessons_remove',['discount' => $gradeLesson->code])}}" id="remove-btn" type="button"
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


@endsection
