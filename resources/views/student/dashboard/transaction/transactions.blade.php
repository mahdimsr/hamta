@extends('layouts.student_dashboard')
@section('style')
    <style>


        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
            color: #fff;
            background-color: #2daebc;
        }
        .card .content {
            padding: 0px 15px 0px 15px;
        }




         .active {
            background: none;
            color: #555;
            border-color: #2b90d9;
        }

        .nav-item{
            float: right!important;
        }
        #home-tab {
            font-size: 1.2em;
        }
         #profile-tab{
             font-size: 1.2em;
         }
         .table-striped>tbody>tr:nth-of-type(odd) {
             background-color: rgba(172, 253, 255, 0.38);
         }
         .table-striped>tbody>tr:nth-of-type(even) {
             background-color: rgba(93, 249, 68, 0.29);
         }
         .table-striped>tbody>tr:nth-of-type(odd):hover {
             background-color: rgb(255, 251, 244);
         }
         .table-striped>tbody>tr:nth-of-type(even):hover {
             background-color: rgb(241, 246, 249);
         }
    </style>
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">

        <div  class="card cards">
            <!-- Rounded tabs -->
            <ul  id="myTab" role="tablist" class="nav nav-tabs nav-pills text-right " >
                <li class="nav-item active">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"  class="nav-link   ">اولی</a>
                </li>
                <li class="nav-item ">
                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link ">دومی</a>
                </li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane active">

                    <div dir="rtl" class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead class="text-right">
                            <th>کد گرایش</th>
                            <th>عنوان گرایش</th>
                            <th>فرآیند</th>
                            </thead>
                            <tbody class="text-center">

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>

                                        <a  id="remove-btn" type="button"
                                           style="font-size: 12px;" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a  style="font-size: 12px;" class="btn btn-info">
                                            ویرایش
                                        </a>

                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>

                                        <a  id="remove-btn" type="button"
                                            style="font-size: 12px;" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a  style="font-size: 12px;" class="btn btn-info">
                                            ویرایش
                                        </a>

                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>

                                        <a  id="remove-btn" type="button"
                                            style="font-size: 12px;" class="btn btn-danger">
                                            حذف
                                        </a>
                                        <a  style="font-size: 12px;" class="btn btn-info">
                                            ویرایش
                                        </a>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
                <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade ">

                </div>

            </div>
            <!-- End rounded tabs -->
        </div>


</div>
    </div>
@endsection