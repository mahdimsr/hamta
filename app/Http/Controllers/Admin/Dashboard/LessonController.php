<?php

    namespace App\Http\Controllers\Admin\Dashboard;

    use App\model\Lesson;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Validation\Rule;


    class LessonController extends Controller
    {

        public function lessons()
        {

            $lessons = Lesson::whereNotIn('parentId',[0])->get();

            return view('admin.dashboard.lesson.lessons', compact('lessons'));
        }


        public function remove($url)
        {

            $lesson = Lesson::query()->where('url', $url)->first();

            $lesson->delete();

            return redirect()->route('admin_lessons');
        }


        public function addShow()
        {

            $modify = 0;
            $categories = Lesson::whereIn('parentId',[0])->get();

            return view('admin.dashboard.lesson.form', compact('modify','categories'));
        }


        public function add(Request $request)
        {

            $this->validate($request, [

                'titleLesson' => 'required|alpha|max:10',
                'category'    => 'required',
                'codeLesson'  => 'required|numeric|digits:3|unique:lesson,discount',
                'urlLesson'   => 'required|string|unique:lesson,url',

            ]);

            $lesson = new Lesson();

            $lesson->title    = $request->input('titleLesson');
            $lesson->parentId = $request->input('category');
            $lesson->code     = $request->input('codeLesson');
            $lesson->url      = $request->input('urlLesson');

            $lesson->save();

            return redirect()->route('admin_lessons');
        }


        public function editShow($url)
        {

            $modify = 1;
            $categories = Lesson::whereIn('parentId',[0])->get();

            $lesson = Lesson::query()->where('url', $url)->first();

            return view('admin.dashboard.lesson.form', compact('lesson', 'modify','categories'));
        }


        public function edit(Request $request, $url)
        {

            $lesson = Lesson::query()->where('url', $url)->first();

            $this->validate($request, [

                'titleLesson' => 'required|string|max:20',
                'category'    => 'required',
                'codeLesson'  => ['required', 'numeric', 'digits:3', Rule::unique('lesson', 'discount')->ignore($lesson)],
                'urlLesson'   => ['required', 'string', Rule::unique('lesson', 'url')->ignore($lesson)],

            ]);


            $lesson->title    = $request->input('titleLesson');
            $lesson->parentId = $request->input('category');
            $lesson->code     = $request->input('codeLesson');
            $lesson->url      = $request->input('urlLesson');

            $lesson->update();

            return redirect()->route('admin_lessons');
        }
    }
