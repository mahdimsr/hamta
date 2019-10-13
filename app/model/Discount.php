<?php

    namespace App\model;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Morilog\Jalali\Jalalian;


    /**
     * @property Carbon $created_at
     * @property Carbon $updated_at
     * @property Carbon $deleted_at
     * @property int    $id
     * @property string $code
     * @property int    $value
     * @property string $type
     * @property Carbon $endDate
     */
    class Discount extends Model
    {

        protected $table = 'discount';

        use SoftDeletes;

        protected $appends = ['isExpired', 'persianEndDate', 'persianType'];

        protected static function boot()
        {

            parent::boot();


            self::deleting(function($model)
            {

                $model->studentCodes()->delete();
                $model->examCodes()->delete();

            });
        }

        public function studentCodes()
        {

            return $this->hasMany(StudentCode::class, 'discountId');
        }

        public function examCodes()
        {

            return $this->hasMany(ExamCode::class, 'discountId');
        }

        public function getIsExpiredAttribute()
        {

            $today = Carbon::now();

            $isExpired = $today->gte($this->endDate);

            return $isExpired;
        }


        public function getPersianEndDateAttribute()
        {


            $carbon = Carbon::createFromDate($this->endDate);

            $date = Jalalian::fromDateTime($carbon)->format('%A, %d %B %y');

            return $date;

        }


        public function getPersianTypeAttribute()
        {

            $typeArray = ['GENERAL-CHARGE'            => 'شارژ حساب کاربری',
                          'GENERAL-LESSONEXAM-OFF'    => 'تخفیف آزمون های درس به درس',
                          'STUDENT-OFF'               => 'تخفیف اختصاصی دانش آموز',
                          'STUDENT-CHARGE'            => 'شارژ حساب اختصاصی دانش آموز',
                          'LESSONEXAM-OFF'            => 'تخفیف اختصاصی آزمون درس به درس'];

            return $typeArray[ $this->type ];
        }

    }
