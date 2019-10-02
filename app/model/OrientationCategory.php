<?php

    namespace App\model;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;


    /**
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @property int            $id
     * @property string         $code
     * @property \Carbon\Carbon $deleted_at
     */
    class OrientationCategory extends Model
    {

        use SoftDeletes;

        protected $table   = 'orientation_category';
        protected $appends = ['persiantype'];


        protected static function boot()
        {

            parent::boot();

            self::creating(function($model)
            {

                $orientation = Orientation::query()->find($model->orientationId);
                $category    = Category::query()->find($model->categoryId);

                $code = $category->code . $orientation->code;

                $model->code = $code;

            });
        }


        public function orientation()
        {

            return $this->belongsTo(Orientation::class, 'orientationId');
        }


        public function category()
        {

            return $this->belongsTo(Category::class, 'categoryId');
        }


        public function getPersianTypeAttribute()
        {

            return $this->persianEnum($this->type);
        }


        public function persianEnum($enumKey)
        {

            $enumArray = [

                'GENERAL' => 'عمومی',
                'EXPERT'  => 'تخصصی',];

            return $enumArray[ $enumKey ];
        }

    }
