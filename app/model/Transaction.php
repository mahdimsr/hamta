<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
    use Morilog\Jalali\Jalalian;

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
     * @property string         $status
     * @property string         $code
     */
    class Transaction extends Model
    {

        protected $table = 'transaction';

        protected $appends = ['persian_updatedAt', 'persian_itemType'];

        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                if ($model->type == 'PURCHASE')
                {

                    $student          = Auth::guard('student')->user();
                    $model->studentId = $student->id;

                    $code = substr(md5(uniqid(mt_rand(), true)), 0, 9);

                    $model->code = $code;
                }

            });
        }

        public function getPersianUpdatedAtAttribute()
        {

            $date = Jalalian::fromCarbon($this->updated_at)->format('%Y/%m/%d');

            return $date;
        }

        public function getPersianItemTypeAttribute()
        {
            return $this->persianEnum($this->itemType);
        }

        public function persianEnum($enumKey)
        {
            $enumArray = [

                'LESSON_EXAM'    => 'آزمون درس به درس',
            ];

            return $enumArray[$enumKey];
        }

        public function student()
        {

            return $this->belongsTo(Student::class, 'studentId');
        }


        public function lessonExam()
        {

            return $this->belongsTo(LessonExam::class, 'itemId');
        }

        public function discount()
        {

            return $this->belongsTo(Discount::class, 'discountId');
        }

    }
