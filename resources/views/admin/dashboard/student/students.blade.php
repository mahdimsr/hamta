@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">مشخصات دانش آموزان همپا</h4>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>نام و نام خانوادگی</th>
                        <th>مقطع</th>
                        <th>گرایش</th>
                        <th>شماره تلفن همراه</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($students as $student)
							<tr>
								<td>{{$student->name . ' ' . $student->familyName}}</td>
                                <td>{{$student->grade->title}}</td>
                                <td>{{$student->orientation->title}}</td>
                                <td>{{$student->mobile}}</td>
								<td>
									<a href="{{route('admin_students_editShow',['id' => $student->id])}}"
									   style="font-size: 12px;" class="btn btn-info">
										ویرایش
                                    </a>
                                    <a href="{{route('admin_students_discounts',['id' => $student->id])}}"
                                            style="font-size: 12px;" class="btn btn-info">
                                             کد های تخفیف
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
