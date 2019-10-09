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



	public function remove($url)
	{
		$orientation = Orientation::query()->where('url', $url)->first();

		$orientation->delete();

		return redirect()->route('admin_orientations');
	}



	public function addShow()
	{
		$modify = 0;

		return view('admin.dashboard.orientation.form', compact('modify'));
	}



	public function add(Request $request)
	{

		$this->validate($request, [

			'titleOrientation' => 'required|max:20',
			'codeOrientation'  => 'required|numeric|digits:2|unique:orientation,discount',
			'urlOrientation'   => 'required|string|unique:orientation,url',

		]);

		$orientation = new Orientation();

		$orientation->title = $request->input('titleOrientation');
		$orientation->code  = $request->input('codeOrientation');
		$orientation->url   = $request->input('urlOrientation');

		$orientation->save();

		return redirect()->route('admin_orientations');

	}



	public function editShow($url)
	{
		$modify = 1;

		$orientation = Orientation::query()->where('url', $url)->first();


		return view('admin.dashboard.orientation.form', compact('orientation', 'modify'));
	}



	public function edit(Request $request, $url)
	{
		$orientation = Orientation::query()->where('url', $url)->first();

		$this->validate($request, [

			'titleOrientation' => 'required|max:20',
			'codeOrientation'  => [
				'required',
				'numeric',
				'digits:2',
				Rule::unique('orientation', 'discount')->ignore($orientation),
			],
			'urlOrientation'   => ['required', 'string', Rule::unique('orientation', 'url')->ignore($orientation)],

		]);


		$orientation->title = $request->input('titleOrientation');
		$orientation->code  = $request->input('codeOrientation');
		$orientation->url   = $request->input('urlOrientation');

		$orientation->update();

		return redirect()->route('admin_orientations');
	}
}
