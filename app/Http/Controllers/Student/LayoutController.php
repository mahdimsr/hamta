<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    //
    public function __construct()
    {
        $student      = Auth::guard('student')->user();
        return view ('layouts.student_dashboard',compact('student'));
    }
}
