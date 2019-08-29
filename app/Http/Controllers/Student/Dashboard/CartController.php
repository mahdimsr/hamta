<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\model\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
	public function cart()
	{
		$student = Auth::guard('student')->user();

		$cart = Cart::query()->where('studentId',$student->id)->where('status','NOT-PAID')->first();

		return view('student.dashboard.cart.cart',compact('cart','student'));
    }
}
