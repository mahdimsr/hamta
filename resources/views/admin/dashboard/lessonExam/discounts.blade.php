@extends('layouts.admin_dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-right">کدهای تخفیف اختصاصی آزمون</h4>
                        <a href="{{route('admin_ltlExams_discountAddShow',['exm' => $exm])}}" style="font-size: 12px;" class="btn btn-info pull-right btn-table-header">
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
                                @foreach($examDiscounts as $examDiscount)
                                @if($examDiscount->discount->type=='LESSONEXAM-OFF')
                                <tr>
                                    <td>{{$examDiscount->discount->code}}</td>
                                    <td>{{$examDiscount->discount->value}}</td>
                                    <td>{{$examDiscount->discount->persianType}}</td>
                                    <td>{{$examDiscount->discount->persianEndDate}}</td>
                                    <td>{{$examDiscount->discount->isExpired ? 'منقضی شده' : 'فعال'}}</td>
                                    <td>{{$examDiscount->discount->count}}</td>
                                    <td>
                                        <a href="{{route('admin_ltlExams_discountRemove',['exm' => $exm ,'discountId' => $examDiscount->discount->id])}}" id="remove-btn" type="button"
                                           style="font-size: 12px;" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a href="{{route('admin_ltlExams_discountEditShow',['exm' => $exm ,'discountId' => $examDiscount->discount->id])}}" style="font-size: 12px;" class="btn btn-info">
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
