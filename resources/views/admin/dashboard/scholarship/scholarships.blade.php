@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">بورسیه ها</h4>
					<p class="category text-right">زیرنویس جدول</p>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کدمقطع</th>
						<th>عنوان مقطع</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($scholarships as $scholarShip)
							<tr>
								<td>{{$scholarShip->student->name .' ' .$scholarShip->student->familyName}}</td>
								<td>{{$scholarShip->persianStatus}}</td>
								<td>
									<a href="{{route('admin_scholarships_editShow',['url' => $scholarShip->url])}}"
									   id="remove-btn" type="button"
									   style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_scholarships_editShow',['url' => $scholarShip->url])}}"
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


	</script>

@endsection
