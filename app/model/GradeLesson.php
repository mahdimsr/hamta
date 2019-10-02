<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property int            $id
     * @property int            $lessonId
     * @property int            $gradeId
     * @property int            $orientationId
     * @property string         $code
     * @property int            $ratio
     * @property string         $type
     * @property \Carbon\Carbon $deleted_at
     */
    class GradeLesson extends Model
    {

        use SoftDeletes;

        protected $table = 'grade_lesson';

        protected $appends = ['title', 'lesson_grade'];


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $lesson              = Lesson::query()->find($model->lessonId);
                $grade               = Grade::query()->find($model->gradeId);
                $orientationCategory = OrientationCategory::query()->find($model->orientationCategoryId);

                $code        = $orientationCategory->orientation->code . $grade->code . $lesson->code;
                $model->code = $code;

            });
        }


        public function getTitleAttribute()
        {

            $lessonTitle      = $this->lesson->title;
            $gradeTitle       = $this->grade->title;
            $orientationTitle = $this->orientationCategory->orientation->title;
            $categoryTitle    = $this->orientationCategory->category->title;

            return $orientationTitle .' - '. $categoryTitle .' - ' . $lessonTitle . ' - ' . $gradeTitle;
        }


        public function getLessonGradeAttribute()
        {

            $lessonTitle = $this->lesson->title;
            $gradeTitle  = $this->grade->title;

            return $lessonTitle . ' - ' . $gradeTitle;
        }


        public function grade()
        {

            return $this->belongsTo(Grade::class, 'gradeId');
        }


        public function lesson()
        {

            return $this->belongsTo(Lesson::class, 'lessonId');
        }


        public function lessonExam()
        {

            return $this->hasMany(ExamGradeLesson::class, 'gradeLessonId');
        }


        public function questions()
        {

            return $this->hasMany(Question::class, 'gradeLessonId');
        }

        public function orientationCategory()
        {

            return $this->belongsTo(OrientationCategory::class, 'orientationCategoryId');
        }

    }
