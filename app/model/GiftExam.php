<?php

    namespace App\model;

    use App\Lib\Lib;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Facades\Storage;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property int            $id
     * @property string         $exm
     * @property string         $title
     * @property string         $description
     * @property string         $answerSheet
     * @property int            $duration
     * @property \Carbon\Carbon $activeTime
     * @property \Carbon\Carbon $deleted_at
     **/
    class GiftExam extends Model
    {

        protected $table = 'gift_exam';

        use SoftDeletes;


        protected $appends = ['answerSheetPath'];


        public function getAnswerSheetPathAttribute()
        {

            $path = Storage::disk('giftExam')->url($this->id . '/' . $this->answerSheet);

            return $path;
        }


        public function gradeLessons()
        {

            return $this->hasManyThrough(GradeLesson::class, ExamGradeGift::class, 'examId', 'id', 'id', 'gradeLessonId');
        }


        public function examGradeGifts()
        {

            return $this->hasMany(ExamGradeGift::class,'examId');
        }


        public function grades()
        {

            $gradeArray = array();

            foreach ($this->gradeLessons as $gradeLesson)
            {
                array_push($gradeArray, $gradeLesson->grade);
            }

            $unique_gradeId = Lib::unique_ObjectArray($gradeArray, 'id');

            $grades = array();

            foreach ($unique_gradeId as $id)
            {
                $grade = Grade::query()->find($id);

                array_push($grades, $grade);
            }

            return $grades;
        }


        public function orientation()
        {

            $orientationArray = array();

            foreach ($this->gradeLessons as $gradeLesson)
            {
                array_push($orientationArray, $gradeLesson->orientation);
            }

            $unique_oriId = Lib::unique_ObjectArray($orientationArray, 'id');

            $orientation = array();

            foreach ($unique_oriId as $id)
            {
                $ori = Orientation::query()->find($id);

                array_push($orientation, $ori);
            }

            return $orientation;

        }


        public function lessons()
        {

            $lessonArray = array();

            foreach ($this->gradeLessons as $gradeLesson)
            {
                array_push($lessonArray, $gradeLesson->lesson);
            }

            $unique_lessonId = Lib::unique_ObjectArray($lessonArray, 'id');

            $lessons = array();

            foreach ($unique_lessonId as $id)
            {
                $lesson = Lesson::query()->find($id);

                array_push($lessons, $lesson);
            }

            return $lessons;
        }

        public function remove($exm)
        {

            $exam = GiftExam::query()->where('exm', $exm)->first();

            $exam->delete();

            return redirect()->back();
        }

    }
