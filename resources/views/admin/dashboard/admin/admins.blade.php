@extends('layouts.admin_dashboard')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">ادمین ها</h4>
					<a href="{{route('admin_admins_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
						افزودن ادمین جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>نام و نام خانوادگی</th>
						<th>نام کاربری</th>
						<th>سطح دسترسی</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($admins as $admin)
							<tr>
								<td>{{$admin->fullName}}</td>
								<td>{{$admin->username}}</td>
								<td>{{$admin->persianlevel}}</td>
								<td>

                                    <button data-modal-trigger="remove-modal"
                                            data-remove-route="{{route('admin_admins_remove',['username' => $admin->username])}}"
                                            class="trigger btn btn-danger" style="font-size: 12px;">

                                        حذف
                                    </button>
									<a href="{{route('admin_admins_editShow',['username' => $admin->username])}}" style="font-size: 12px;" class="btn btn-info">
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
                            <h2>حذف ادمین</h2>
                        </header>
                        <div class="content"  dir="rtl">
                            <p>آیا مایل هستید ادمین ایجاد شده حذف شود؟</p>
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
