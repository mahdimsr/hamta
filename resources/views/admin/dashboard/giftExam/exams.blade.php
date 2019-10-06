@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">آزمون های جایزه دار</h4>
					<p class="category text-right">تمامی آزمون های جایزه دار</p>
					<a href="{{route('admin_giftExams_addShow')}}" style="font-size: 12px;"
					   class="btn btn-info pull-right btn-table-header">
						افزودن آزمون جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کد</th>
						<th>عنوان</th>
						<th>زمان شروع آزمون</th>
						<th>پاسخ برگ</th>
						<th>تعداد سوالات</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($giftExams as $exam)
							<tr>
								<td>{{$exam->exm}}</td>
								<td>{{$exam->title}}</td>
								<td>{{$exam->persianActiveTime}}</td>
								<td>{{$exam->answerSheet ? 'دارد' : 'ندارد'}}</td>
                                <td>{{count($exam->questionExams)}}</td>
								<td>

									<a href="{{route('admin_giftExams_remove',['exm' => $exam->exm])}}" id="remove-btn"
									   type="button"
									   style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_giftExams_editShow',['exm' => $exam->exm])}}"
									   style="font-size: 12px;" class="btn btn-info">
										ویرایش
									</a>

									<a href="{{route('admin_giftExams_questionsShow',['exm' => $exam->exm])}}"
									   style="font-size: 12px;" class="btn btn-success">
										سوالات
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
