<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Orientation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class OrientationController extends Controller
{
	public function orientations()
	{
		$orientations = Orientation::all();

		return view('admin.dashboard.orientation.orientations', compact('orientations'));
	}



	public function remove(Request $r)
	{
		$orientation = Orientation::query()->where('url', $r->input('url'))->first();

		$orientation->delete();

		return redirect()->route('admin_orientations');
	}



	public function addShow()
	{
		return view('admin.dashboard.orientation.add');
	}



	public function add(Request $r)
	{

		$this->validate($r, [

			'titleOrientation' => 'required|max:20',
			'codeOrientation'  => 'required|numeric|digits:2|unique:orientation,code',
			'urlOrientation'   => 'required|string|unique:orientation,url',

		]);

		$orientation = new Orientation();

		$orientation->title = $r->input('titleOrientation');
		$orientation->code  = $r->input('codeOrientation');
		$orientation->url   = $r->input('urlOrientation');

		$orientation->save();

		return redirect()->route('admin_orientations');

	}



	public function editShow(Request $r)
	{
		$orientation = Orientation::query()->where('url', $r->input('url'))->first();


		return view('admin.dashboard.orientation.edit', compact('orientation'));
	}



	public function edit(Request $r)
	{
		$orientation = Orientation::query()->find($r->input('id'));

		$this->validate($r, [

			'titleOrientation' => 'required|max:20',
			'codeOrientation'  => [
				'required',
				'numeric',
				'digits:2',
				Rule::unique('orientation', 'code')->ignore($orientation),
			],
			'urlOrientation'   => ['required', 'string', Rule::unique('orientation', 'url')->ignore($orientation)],

		]);


		$orientation->title = $r->input('titleOrientation');
		$orientation->code  = $r->input('codeOrientation');
		$orientation->url   = $r->input('urlOrientation');

		$orientation->update();

		return redirect()->route('admin_orientations');
	}
}
