<?php

    namespace App\Http\Controllers\Admin\Dashboard;


    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Validation\Rule;


    class CodeController extends Controller
    {

        public function codes()
        {
            return view('admin.dashboard.code.codes');
        }


    }
