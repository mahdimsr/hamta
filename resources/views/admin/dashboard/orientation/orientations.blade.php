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

                                    <button data-modal-trigger="remove-modal"
                                            data-remove-route="{{route('admin_orientations_remove',['url' => $orientation->url])}}"
                                            class="trigger btn btn-danger" style="font-size: 12px;">
                                        حذف
                                    </button>
									<a href="{{route('admin_orientations_editShow',['url' => $orientation->url])}}" style="font-size: 12px;" class="btn btn-info">
										ویرایش
									</a>

								</td>
							</tr>
						@endforeach

						</tbody>
					</table>

                </div>
                <div data-modal="remove-modal" class="modal">
                    <article class="content-wrapper">
                        <button class="close"></button>
                        <header class="modal-header">
                            <h2>حذف گرایش</h2>
                        </header>
                        <div class="content"  dir="rtl">
                            <p>آیا مایل هستید گرایش ایجاد شده حذف شود؟</p>
                        </div>
                        <footer class="modal-footer">
                            <a class="action">بله</a>
                            <button class="action" id="close">خیر</button>
                        </footer>
                    </article>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('script')

	<script>

	</script>

@endsection
