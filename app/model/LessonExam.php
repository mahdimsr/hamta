<?php

    namespace App\model;

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
     * @property string         $price
     * @property string         $answerSheet
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

        protected $appends = ['answerSheetPath'];


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $grade  = Grade::query()->find($model->gradeId);
                $oriCat = OrientationCategory::query()->find($model->orientationCategoryId);

                $str = substr(md5(uniqid(rand(), true)), 0, 1);;
                $exm = 'exm-' . $str . '-' . $grade->code . $oriCat->orientation->code;

                while (LessonExam::query()->where('exm', $exm)->exists())
                {
                    $str = substr(md5(uniqid(rand(), true)), 0, 1);
                    $exm = 'exm-' . $str . '-' . $grade->code . $oriCat->orientation->code;
                }

                $model->exm = $exm;

            });
        }


        public function getAnswerSheetPathAttribute()
        {

            $path = Storage::disk('lessonExam')->url($this->id . '/' . $this->answerSheet);

            return $path;
        }

        public function orientationCategory()
        {

            return $this->belongsTo(OrientationCategory::class, 'orientationCategoryId');
        }

        public function examGradeLessons()
        {

            return $this->hasMany(ExamGradeLesson::class, 'examId');
        }


        public function questionExams()
        {

            return $this->hasMany(QuestionExam::class, 'examId');
        }

    }
