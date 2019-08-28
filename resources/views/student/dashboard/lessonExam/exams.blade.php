@extends('layouts.student_dashboard')
@section('content')

	<div class="row" dir="rtl">

		@foreach($lessonExams as $exam)

			<div class="col-md-3" style="float: right">
				<div class="card">

					<div class="header">
						<h4 class="title">{{$exam->title}}</h4>
						<p class="category">{{$exam->description}}</p>
					</div>
					<div class="content">
						<div id="chartPreferences" class="ct-chart ct-perfect-fourth"
							 style="background-color: plum"></div>

						<div class="footer">
							<div class="legend">
								<i class="fa fa-circle text-info"></i> Open
								<i class="fa fa-circle text-info"></i> Open
								<i class="fa fa-circle text-danger"></i> Bounce
								<i class="fa fa-circle text-warning"></i> Unsubscribe
							</div>
							<hr>
							<div class="stats">
								<button id="addToCart" onclick="addToCart('{{$exam->exm}}');"
										class="btn btn-fill btn-info">افزودن به سبد خرید
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>


		@endforeach

	</div>

@endsection

@section('script')

	<script type="text/javascript">

		$("#cartItems").text('5');


		function addToCart(exm)
		{


			$.ajax({
				type: 'POST',
				url: "{{route('student_addToCart')}}",
				data: {
					_token: "{{ csrf_token() }}",
					exm: exm
				},
				success: function(itemCount)
				{
					if (itemCount)
					{
						console.log(itemCount);


						$("#cartItems").text('hello my friend');

					}
					else
					{
						console.log('no value');
					}
				}
			});
		}

	</script>

@endsection

