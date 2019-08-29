@extends('layouts.student_dashboard')
@section('content')

    <div class="row" dir="rtl">

        <div class="col-md-4">
            <div class="card">

                <div class="header">
                    <h4 class="title">Email Statistics</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="content">
                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Bounce
                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">

                <div class="header">
                    <h4 class="title">آزمون های جایزه دار</h4>
                    <p class="category">آزمون بده جایزه بگیر</p>
                </div>
                <div class="content">
                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i>  فعال
                            <i class="fa fa-circle text-warning"></i> در انتظار انتشار
                            <i class="fa fa-circle text-danger"></i>تمام شده
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> 50 نفر در مجموع شرکت کرده اند
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <a href="{{route('student_dashboard_lessonExams')}}">
                <div class="card">
                    <div class="header">
                        <h4 class="title">آزمون های درس به درس</h4>
                        <p class="category">تمامی آزمون های درس به درس به صورت کامل</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> منتشر شده
                                <i class="fa fa-circle text-warning"></i> درحال انتظار
                                <i class="fa fa-circle text-danger"></i>تکمیل نشده
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> 4 آزمون در انتظار انتشار
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection

