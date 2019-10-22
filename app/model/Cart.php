<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Facades\Auth;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property \Carbon\Carbon $deleted_at
     * @property int            $id
     * @property string         $lessonExamId
     * @property string         $transactionId
     * @property string         $studentId
     */
    class Cart extends Model
    {

        protected $table = 'cart';

        use SoftDeletes;


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $authId = Auth::guard('student')->id();

                $model->studentId = $authId;

            });
        }


        public function lessonExam()
        {

            return $this->belongsTo(LessonExam::class, 'lessonExamId');
        }


        public function transaction()
        {

            return $this->belongsTo(Transaction::class, 'transactionId');
        }


        public function student()
        {

            return $this->belongsTo(Student::class, 'studentId');
        }


        //update transactionId
        public function setTransaction($transaction)
        {

            $this->transactionId = $transaction->id;

            $this->update();
        }

    }
