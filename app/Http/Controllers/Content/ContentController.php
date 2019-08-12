<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContentController extends Controller
{

    public function index()
    {
        return view('homepage.welcome');
    }
}
