@extends('layouts.admin_dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-right">کدهای تخفیف اختصاصی دانش آموز</h4>
                        <a href="{{route('admin_students_discountAddShow',['id' => $id])}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
                                افزودن کد تخفیف اختصاصی
                            </a>
                </div>
                <div dir="rtl" class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead class="text-right">
                        <th>کد</th>
                        <th>درصد</th>
                        <th>نوع</th>
                        <th>تاریخ انقضا</th>
                        <th>وضعیت</th>
                        <th>تعداد دفعات استفاده</th>
                        <th>فرآیند</th>
                        </thead>
                        <tbody class="text-center">
                                @foreach($studentDiscounts as $studentDiscount)
                                @if($studentDiscount->discount->type=='STUDENT-OFF')
                                <tr>
                                    <td>{{$studentDiscount->discount->code}}</td>
                                    <td>{{$studentDiscount->discount->value}}</td>
                                    <td>{{$studentDiscount->discount->persianType}}</td>
                                    <td>{{$studentDiscount->discount->persianEndDate}}</td>
                                    <td>{{$studentDiscount->discount->isExpired ? 'منقضی شده' : 'فعال'}}</td>
                                    <td>{{$studentDiscount->discount->count}}</td>
                                    <td>
                                        <a href="{{route('admin_students_discountRemove',['id' => $id ,'discountId' => $studentDiscount->discount->id])}}" id="remove-btn" type="button"
                                           style="font-size: 12px;" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('admin_students_discountEditShow',['id' => $id ,'discountId' => $studentDiscount->discount->id])}}" style="font-size: 12px;" class="btn btn-info">
                                            ویرایش
                                        </a>
                                    </td>
                                </tr>
                                @endif
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
