<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property \Carbon\Carbon $deleted_at
     * @property int            $id
     * @property int            $lessonExamId
     * @property int            $topicGradeLessonId
     */
    class TopicExam extends Model
    {

        use SoftDeletes;

        protected $table = 'topic_exam';


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $lessonExam       = LessonExam::query()->find($model->lessonExamId);
                $topicGradeLesson = TopicGradeLesson::query()->find($model->topicGradeLessonId);

                $char = substr(md5(uniqid(rand(), true)), 0, 1);
                $code = 'EXM-topic-' . $char . '-' . $topicGradeLesson->gradeLesson->code;

                while (LessonExam::query()->where('exm', $code)->exists())
                {
                    $char = substr(md5(uniqid(rand(), true)), 0, 1);
                    $code = 'EXM-topic-' . $char . '-' . $topicGradeLesson->gradeLesson->code;
                }

                $lessonExam->exm = $code;

                $lessonExam->update();


            });
        }


        public function lessonExam()
        {

            return $this->belongsTo(LessonExam::class, 'lessonExamId');
        }


        public function topicGradeLesson()
        {

            return $this->belongsTo(TopicGradeLesson::class, 'topicGradeLessonId');
        }
    }
