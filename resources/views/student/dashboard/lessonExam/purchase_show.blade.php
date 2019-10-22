@extends('layouts.student_dashboard')

@section('style')

    <link rel="stylesheet" href="{{ asset('css/student/dashboard/showResult.css') }}">


@endsection

@section('content')
    <div class="container">
        <div class="row" dir="rtl">

            <h1>صورت حساب پرداخت</h1>

        </div>



        <div id="time" dir="rtl">
            <h5 class="time-header">نشان دادن زمان ازمون</h5>
        </div>
        <hr>


        <form action="" method="post">

            {{csrf_field()}}



            <div class="card" dir="rtl">
                <div class="card-header">
                    توضیحات پرداخت
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">آزمون درس به درس با کد: <span>#</span></li>
                    <li class="list-group-item">پرداخت توسط: <span>{{$student->name.' ' . $student->familyName}}</span>
                    </li>
                    <li class="list-group-item">قیمت پرداختی (ریال): <span>{{$price}}</span></li>
                    <li class="list-group-item">اگر کد تخفیف دارین وارد نمایید...
                        <div class="row" dir="rtl">
                            <div class="col-md-4">
                                <input id="discountCodeInput" type="text"
                                       name="discountCode"
                                       placeholder="کد تخفیف خود را اینجا وارد نمایید.">
                                <span id="discountError"></span>
                                <button type="button" id="submitDiscount" class="btn btn-primary btn-fill"
                                        onclick="submitDiscountCode()">
                                    اعمال
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">قیمت نهایی برای پرداخت:
                        <span id="finalPrice" name="finalPrice">{{$price}}</span>
                        ریال
                    </li>
                </ul>
            </div>

            <button onclick="purchaseWallet('{{route('student_lessonExams_purchaseWallet',['carts' => $carts])}}')"
                    type="submit" class="btn btn-success btn-fill">
                پرداخت با کیف پول
            </button>

            <button type="submit" class="btn btn-success btn-fill">
                پرداخت از طریق درگاه بانکی
            </button>
        </form>

    </div>
    <script>


        function submitDiscountCode()
        {
            const discountCode  = $('#discountCodeInput').val();
            const discountError = document.querySelector('#discountError');
            const finalPrice    = document.querySelector('#finalPrice');

            const price = {{$price}};

            $.ajax({

                type : "POST",
                url  : "{{route('student_lessonExams_validateDiscountCode')}}",
                data :
                    {

                        discountCode : discountCode,
                        _token       : '{{csrf_token()}}'
                    },

                success : (result) =>
                {
                    discountError.innerText = null;

                    if (result.status === 'error')
                    {
                        discountError.innerText = result.errorMessage;

                        finalPrice.innerText = price;

                    } else if (result.status === 'success')
                    {

                        discountError.innerText = result.successMessage;

                        finalPrice.innerText = price * ((100 - result.discountCode.value) / 100);

                        console.log(result);
                    }

                },

                error : (error) =>
                {
                    console.log(error);
                }

            });
        }


        function purchaseWallet(route)
        {
            const form = document.querySelector("form");

            console.log(form);

            form.action = route;
        }

    </script>
@endsection

