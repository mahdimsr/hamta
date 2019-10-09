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

            $typeArray = ['GENERAL' => 'تمامی خدمات',
                          'STUDENT' => 'اختصاصی دانش آموزان',
                          'EXAM'    => 'اختصاصی آزمون ها'];

            return $typeArray[$this->type];
        }

    }