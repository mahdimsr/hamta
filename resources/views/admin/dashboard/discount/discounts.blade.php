@extends('layouts.admin_dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-right">کدها</h4>
                    <a href="{{route('admin_discount_addShow')}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
                        افزودن کد
                    </a>
                </div>
                <div dir="rtl" class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead class="text-right">
                        <th>شماره</th>
                        <th>کد</th>
                        <th>درصد</th>
                        <th>نوع</th>
                        <th>تاریخ انقضا</th>
                        <th>وضعیت</th>
                        <th>تعداد دفعات استفاده</th>
                        <th>فرآیند</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach($discounts as $discount)
                            <tr>
                                <td>{{$discount->id}}</td>
                                <td>{{$discount->code}}</td>
                                <td>{{$discount->value}}</td>
                                <td>{{$discount->persianType}}</td>
                                <td>{{$discount->persianEndDate}}</td>
                                <td>{{$discount->isExpired ? 'منقضی شده' : 'فعال'}}</td>
                                <td>{{$discount->count}}</td>
                                <td>

                                    <button data-modal-trigger="remove-modal"
                                            data-remove-route="{{route('admin_discount_remove',['id' => $discount->id])}}"
                                            class="trigger btn btn-danger" style="font-size: 12px;">
                                        حذف
                                    </button>
                                    <a href="{{route('admin_discount_editShow',['id' => $discount->id])}}" style="font-size: 12px;" class="btn btn-info">
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
                            <h2>حذف کد</h2>
                        </header>
                        <div class="content"  dir="rtl">
                            <p>آیا مایل هستید کد ایجاد شده حذف شود؟</p>
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
