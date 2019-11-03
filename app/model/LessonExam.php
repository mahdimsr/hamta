<?php

    namespace App\model;

    use App\Lib\Lib;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use Morilog\Jalali\Jalalian;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property int            $id
     * @property string         $exm
     * @property string         $title
     * @property string         $description
     * @property string         $price
     * @property string         $activeDate
     * @property integer        $duration
     * @property string         $status
     * @property boolean        $isPublic
     * @property \Carbon\Carbon $deleted_at
     */
    class LessonExam extends Model
    {

        use SoftDeletes;

        protected $table = 'lesson_exam';

        protected $appends = ['persianCreatedAt', 'persianUpdatedAt'];

        protected $casts
            = [

                'isPublic' => 'boolean',

            ];


        protected static function boot()
        {

            parent::boot();


            self::deleting(function($model)
            {

                $model->examGradeLessons()->delete();
                $model->questionExams()->delete();
                $model->examDiscounts()->delete();
                $model->examCodes()->delete();
                Storage::disk('lessonExam')->deleteDirectory($model->id);

            });
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


        public function examCodes()
        {

            return $this->hasMany(ExamCode::class, 'examId');
        }


        public function examDiscounts()
        {

            return $this->hasManyThrough(Discount::class, ExamCode::class, 'examId', 'id', 'id', 'discountId');
        }


        public function examGradeLessons()
        {

            return $this->hasMany(ExamGradeLesson::class, 'examId')->where('type', 'LESSON_EXAM');
        }


        public function gradeLessons()
        {

            return $this->hasManyThrough(GradeLesson::class, ExamGradeLesson::class, 'examId', 'id', 'id', 'gradeLessonId')
                        ->where('type', 'LESSON_EXAM');
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

            return $this->hasMany(QuestionExam::class, 'examId')->where('type', 'LESSON_EXAM');
        }


        public function questions()
        {

            return $this->hasManyThrough(Question::class, QuestionExam::class, 'examId', 'id', 'id', 'questionId')
                        ->where('type', 'LESSON_EXAM');

        }


        public function hasInCart()
        {

            $authId     = Auth::guard('student')->id();
            $lessonExam = Cart::query()
                              ->where('lessonExamId', $this->id)
                              ->where('studentId', $authId)
                              ->where('transactionId', 0)
                              ->first();

            if ($lessonExam)
            {
                return true;
            }

            else
            {
                return false;
            }

        }


        public function hasPurchased()
        {

            $authId     = Auth::guard('student')->id();
            $lessonExam = Cart::query()
                              ->where('lessonExamId', $this->id)
                              ->where('studentId', $authId)
                              ->whereNotIn('transactionId', [0])
                              ->first();

            if ($lessonExam)
            {
                return true;
            }

            else
            {
                return false;
            }

        }


        public static function filterExam($gradeId, $orientationId)
        {

            $gradeLessons = null;

            if (isset($gradeId) && $orientationId == null)
            {
                $gradeLessons = GradeLesson::query()->whereIn('gradeId', $gradeId)->get();
            }
            elseif (isset($orientationId) && $gradeId == null)
            {
                $gradeLessons = GradeLesson::query()->whereIn('orientationId', $orientationId)->get();
            }
            elseif (isset($gradeId) && isset($orientationId))
            {
                $gradeLessons = GradeLesson::query()
                                           ->whereIn('gradeId', $gradeId)
                                           ->whereIn('orientationId', $orientationId)
                                           ->get();
            }

            $examGradeLessonArray = [];
            $i                    = 0;


            foreach ($gradeLessons as $gradeLesson)
            {
                $examGradeLesson = $gradeLesson->examGradeLesson_lessonExamType;

                if (count($examGradeLesson) > 0)
                {

                    $examGradeLessonArray[ $i++ ] = $examGradeLesson[ 0 ];
                }
            }

            $uniqueArray = Lib::unique_ObjectArray($examGradeLessonArray,'examId');



            $exams = [];
            $i     = 0;

            foreach ($uniqueArray as $examId)
            {
                $lessonExam = LessonExam::query()->find($examId);

                $exams[$i++] = $lessonExam;
            }


            return $exams;
        }

        public function hasUsed()
        {

            $authId    = Auth::guard('student')->id();
            $result    = Result::query()->where('examId', $this->id)->where('studentId', $authId)->where('type','LESSONEXAM')->where('status','COMPLETE')->first();

            if ($result)
            {
                return true;
            }

            else
            {
                return false;
            }

        }

        public function remainingTime()
        {

            $authId       = Auth::guard('student')->id();
            $result       = Result::query()->where('studentId',$authId)->where('examId',$this->id)->first();
            $durationTime = $result->created_at->addMinutes($this->duration)->addSeconds(2);
            $now          = Carbon::now();

                if($now->gte($durationTime))
                {
                    return '00:01';
                }

                else
                {
                    return  gmdate('i:s', $durationTime->diffInSeconds($now));
                }

        }

        public function results()
        {
            return $this->hasMany(Result::class,'examId');
        }
    }
