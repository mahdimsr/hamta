@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">دسته بندی دروس</h4>
					<a href="{{route('admin_categories_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
						افزودن دسته بندی جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>عنوان دسته بندی</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($categories as $category)
							<tr>
								<td>{{$category->title}}</td>
								<td>

									<a href="{{route('admin_categories_remove',['url' => $category->url])}}" id="remove-btn" type="button"
											style="font-size: 12px;" class="btn btn-danger">
										حذف
									</a>
									<a href="{{route('admin_categories_editShow',['url' => $category->url])}}" style="font-size: 12px;" class="btn btn-info">
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
