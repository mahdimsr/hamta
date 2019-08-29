<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
	public function questions()
	{
		return view('admin.dashboard.question.questions');
    }
}
