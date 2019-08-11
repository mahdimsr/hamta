@extends('student.dashboard.layout')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="card text-right">
				<div class="header ">
					<h4 class="title">ویرایش پروفایل</h4>
				</div>
				<div class="content">
					<form>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>(اسم شرکت(غیر فعال</label>
									<input dir="rtl" type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>نام کاربری</label>
									<input dir="rtl" type="text" class="form-control" placeholder="نام کاربری" value="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleInputEmail1">پست الکترونیکی</label>
									<input type="email" class="form-control" placeholder="Example@Gmail.com">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>نام خانوادگی</label>
									<input dir="rtl" type="text" class="form-control" placeholder="نام خانوادگی" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>نام</label>
									<input dir="rtl" type="text" class="form-control" placeholder="نام" >
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>آدرس</label>
									<input dir="rtl" type="text" class="form-control" placeholder="آدرس خانه">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label>انتخاب کنید</label>
								<div class="form-group text-center">
									<div class="col-md-6">
										<label class="checkbox-inline"><input type="checkbox" value="">مورد اول چک باکس</label>
									</div>
									<div class="col-md-6">
										<label class="checkbox-inline"><input type="checkbox" value="">مورد دوم چک باکس</label>
									</div>
								</div>
							</div>
							<div class="col-md-4" style="padding-top: 25px;">
								<div class="form-group text-center">
									<div class="col-md-6">
										<label class="radio-inline"><input type="radio" name="optradio">مورد دوم </label>
									</div>
									<div class="col-md-6">
										<label class="radio-inline"><input type="radio" name="optradio">مورد اول</label>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<label for="sel1">شهر</label>
								<select dir="rtl" class="form-control" id="sel1">
									<option>اراک</option>
									<option>اصفهان</option>
									<option>مشهد</option>
									<option>تهران</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>درباره من</label>
									<textarea dir="rtl" rows="5" class="form-control" placeholder="Here can be your description" value="Mike">اره خلاصه فلان بیسار فلان فلان فلان </textarea>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-info btn-fill pull-right">ثبت تغییرات</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>


	</div>

@endsection