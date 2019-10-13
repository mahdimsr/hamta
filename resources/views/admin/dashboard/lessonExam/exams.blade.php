@extends('layouts.admin_dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="{{ asset('css/admin/dashboard/popup.css') }}">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-right">آزمون های درس به درس</h4>
					<p class="category text-right">تمامی آزمون های درس به درس</p>
					<a href="{{route('admin_ltlExams_addShow')}}" style="font-size: 12px;"
					   class="btn btn-info pull-right btn-table-header">
						افزودن آزمون جدید
					</a>
				</div>
				<div dir="rtl" class="content table-responsive table-full-width">
					<table class="table table-hover table-striped">
						<thead class="text-right">
						<th>کد</th>
						<th>عنوان</th>
						<th>قیمت</th>
                        <th>پاسخ برگ</th>
                        <th>تعداد سوالات</th>
						<th>فرآیند</th>
						</thead>
						<tbody class="text-center">
						@foreach($lessonExam as $exam)
							<tr>
								<td>{{$exam->exm}}</td>
								<td>{{$exam->title}}</td>
								<td>{{$exam->price/10 . ' تومان '}}</td>
                                <td>{{$exam->answerSheet ? 'دارد' : 'ندارد'}}</td>
                                <td>{{count($exam->questionExams)}}</td>
								<td>

										{{-- <a href="{{route('admin_ltlExams_remove',['exm' => $exam->exm])}}" id="remove-btn"
												type="button"
												style="font-size: 12px;" class="btn btn-danger">
												 حذف
											 </a>
		                                        --}}




										<button data-modal-trigger="trigger-1" class="trigger btn btn-danger">
												
												حذف
											</button>
											
											
											<div data-modal="trigger-1" class="modal">
												<article class="content-wrapper">
													<button class="close"></button>
													<header class="modal-header">
														<h2>حذف اطلاعات</h2>
													</header>
													<div class="content">
														<p>ایا مایل هستید آزمون درس به درس ایحاد شده حذف شود؟</p>
													</div>
													<footer class="modal-footer">
														<button class="action">حذف شود</button>
														<button class="action">حذف نشود</button>
													</footer>
												</article>
											</div>


									<a href="{{route('admin_ltlExams_editShow',['exm' => $exam->exm])}}"
									   style="font-size: 12px;" class="btn btn-info">
										ویرایش
									</a>




									<a href="{{route('admin_ltlExams_questionsShow',['exm' => $exam->exm])}}"
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
		const buttons = document.querySelectorAll(`button[data-modal-trigger]`);

for(let button of buttons) {
	modalEvent(button);
}

function modalEvent(button) {
	button.addEventListener('click', () => {
		const trigger = button.getAttribute('data-modal-trigger');
		const modal = document.querySelector(`[data-modal=${trigger}]`);
		const contentWrapper = modal.querySelector('.content-wrapper');
		const close = modal.querySelector('.close');

		close.addEventListener('click', () => modal.classList.remove('open'));
		modal.addEventListener('click', () => modal.classList.remove('open'));
		contentWrapper.addEventListener('click', (e) => e.stopPropagation());

		modal.classList.toggle('open');
	});
}
	</script>

@endsection
