<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property \Carbon\Carbon $deleted_at
     * @property int            $id
     * @property string         $type
     * @property int            $studentId
     * @property string         $itemType
     * @property int            $itemId
     * @property int            $price
     * @property int            $discountId
     * @property int            $discountPrice
     * @property string         $code
     */
    class Transaction extends Model
    {

        protected $table = 'transaction';


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $student = Auth::guard('student')->user();

                $model->studentId = $student->id;

                $code = substr(md5(uniqid(mt_rand(), true)), 0, 8);

                $model->code = $code;

            });
        }


        public function student()
        {

            return $this->belongsTo(Student::class, 'studentId');
        }


        public function lessonExams()
        {

            return $this->hasMany(LessonExam::class, 'itemId')->where('itemType', 'LESSON_EXAM');
        }


        public function giftExams()
        {

            return $this->hasMany(GiftExam::class, 'itemId')->where('itemType', 'GIFT_EXAM');
        }


    }
