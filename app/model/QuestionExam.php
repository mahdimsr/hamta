<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property \Carbon\Carbon $deleted_at
     * @property int            $id
     * @property int            $examId
     * @property int            $questionId
     * @property string         $type
     */
    class QuestionExam extends Model
    {

        use SoftDeletes;

        protected $table = 'question_exam';


        public function lessonExam()
        {

            return $this->belongsTo(LessonExam::class, 'examId');
        }


        public function question()
        {

            return $this->belongsTo(Question::class, 'questionId');
        }

    }
