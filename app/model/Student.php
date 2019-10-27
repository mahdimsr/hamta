<?php

    namespace App\model;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Laravel\Passport\HasApiTokens;
    use Morilog\Jalali\Jalalian;


    /**
     * @property \Carbon\Carbon $created_at
     * @property int            $id
     * @property \Carbon\Carbon $updated_at
     * @property \Carbon\Carbon $deleted_at
     */
    class Student extends Authenticatable
    {

        use SoftDeletes,HasApiTokens;

        protected $table = 'student';

        protected $appends = ['persian_birthday'];


        public function getPersianBirthdayAttribute()
        {

            $carbon = Carbon::createFromDate($this->birthday);

            $date = Jalalian::fromCarbon($carbon)->format('%Y/%m/%d');

            return $date;
        }


        public function city()
        {

            return $this->hasOne(City::class, 'id', 'cityId');
        }


        public function orientation()
        {

            return $this->hasOne(Orientation::class, 'id', 'orientationId');
        }


        public function grade()
        {

            return $this->hasOne(Grade::class, 'id', 'gradeId');
        }


        public function scholarship()
        {

            return $this->hasOne(Scholarship::class, 'studentId', 'id');
        }


        public function transactions()
        {

            return $this->hasMany(Transaction::class, 'studentId');
        }


        public function carts()
        {

            return $this->hasMany(Cart::class, 'studentId');
        }

    }

