<?php

    namespace App\model;

    use App\Lib\Lib;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Facades\Storage;
    use Morilog\Jalali\Jalalian;


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
     * @property \Carbon\Carbon $resultDate
     * @property \Carbon\Carbon $deleted_at
     **/
    class GiftExam extends Model
    {

        protected $table = 'gift_exam';

        use SoftDeletes;


        protected $appends = ['answerSheetPath', 'persianActiveTime','persianCreatedAt','persianUpdatedAt'];


        protected static function boot()
        {

            parent::boot();

            self::deleting(function($model)
            {

                $model->examGradeLessons()->delete();
                $model->questionExams()->delete();
                Storage::disk('giftExam')->deleteDirectory($model->id );

            });
        }


        public function getAnswerSheetPathAttribute()
        {

            $path = Storage::disk('giftExam')->url($this->id . '/' . $this->answerSheet);

            return $path;
        }


        public function getPersianActiveTimeAttribute()
        {

            $carbon = Carbon::createFromDate($this->activeTime);

            $date = Jalalian::fromDateTime($carbon)->format('%A, %d %B %y , %H:%M');

            return $date;
        }

        public function getPersianCreatedAtAttribute()
        {
            $date = Jalalian::fromCarbon($this->created_at)->format('%A, %d %B %y');

            return $date;
        }



        public function getPersianUpdatedAtAttribute()
        {
            $date = Jalalian::fromCarbon($this->updated_at)->format('%A, %d %B %y');

            return $date;
        }


        public function gradeLessons()
        {

            return $this->hasManyThrough(GradeLesson::class, ExamGradeLesson::class, 'examId', 'id', 'id', 'gradeLessonId')
                        ->where('type', 'GIFT_EXAM');
        }


        public function examGradeLessons()
        {

            return $this->hasMany(ExamGradeLesson::class, 'examId')
                        ->where('type', '=', 'GIFT_EXAM');
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


        public function questionExams()
        {

            return $this->hasMany(QuestionExam::class, 'examId')
                        ->where('type', 'GIFT_EXAM');
        }


        public function questions()
        {

            return $this->hasManyThrough(Question::class, QuestionExam::class, 'examId', 'id', 'id', 'questionId')
                        ->where('type', 'GIFT_EXAM');
        }

    }
