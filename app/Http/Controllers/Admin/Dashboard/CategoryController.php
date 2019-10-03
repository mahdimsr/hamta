<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\model\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function categories()
    {

        $categories = Lesson::whereIn('parentId',[0])->get();

        return view('admin.dashboard.category.categories', compact('categories'));
    }


    public function remove($url)
    {

        $category = Lesson::query()->where('url', $url)->first();

        $category->delete();

        return redirect()->route('admin_categories');
    }


    public function addShow()
    {

        $modify = 0;

        return view('admin.dashboard.category.form', compact('modify'));
    }


    public function add(Request $request)
    {

        $this->validate($request, [

            'titleCategory' => 'required|alpha|max:10',
            'urlCategory'   => 'required|string|unique:lesson,url',

        ]);

        $category = new Lesson();

        $category->title    = $request->input('titleCategory');
        $category->url      = $request->input('urlCategory');

        $category->save();

        return redirect()->route('admin_categories');
    }


    public function editShow($url)
    {

        $modify = 1;
        $category = Lesson::query()->where('url', $url)->first();

        return view('admin.dashboard.category.form', compact('category', 'modify'));
    }


    public function edit(Request $request, $url)
    {

        $category = Lesson::query()->where('url', $url)->first();

        $this->validate($request, [

            'titleCategory' => 'required|string|max:20',
            'urlCategory'   => ['required', 'string', Rule::unique('lesson', 'url')->ignore($category)],

        ]);

        $category->title    = $request->input('titleCategory');
        $category->url      = $request->input('urlCategory');

        $category->update();

        return redirect()->route('admin_categories');
    }
}
