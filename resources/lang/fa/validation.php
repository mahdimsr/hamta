<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'accepted'             => ':attribute باید پذیرفته شده باشد',
	'active_url'           => 'آدرس :attribute معتبر نیست',
	'after'                => ':attribute باید تاریخی بعد از :date باشد',
	'after_or_equal'       => ':attribute باید روز :date یا بعد از آن باشد',
	'alpha'                => ':attribute باید شامل حروف الفبا باشد',
	'alpha_dash'           => ':attribute باید شامل حروف الفبا، اعداد، خط تیره ( - ) و زیر خط ( _ ) باشد',
	'alpha_num'            => ':attribute باید شامل حروف و اعداد باشد',
	'array'                => ':attribute باید آرایه باشد',
	'before'               => ':attribute باید تاریخی قبل از :date باشد',
	'before_or_equal'      => ':attribute باید روز :date یا قبل از آن باشد',
	'between'              => [
		'numeric' => ':attribute باید بین :max و :min باشد',
		'file'    => ':attribute باید بین :max  و :min کیلوبایت باشد',
		'string'  => ':attribute باید بین :max  و :min حرف باشد',
		'array'   => ':attribute باید بین :max  و :min آیتم باشد',
	],
	'boolean'              => 'The :attribute field must be true or false.',
	'confirmed'            => ':attribute و تکرار آن تطابق ندارد',
	'date'                 => 'The :attribute is not a valid date.',
	'date_equals'          => 'The :attribute must be a date equal to :date.',
	'date_format'          => 'The :attribute does not match the format :format.',
	'different'            => ':attribute باید با :other متفاوت باشد',
	'digits'               => ':attribute باید حتما :digits رقم باشد',
	'digits_between'       => ':attribute باید بین :max و :min رقم باشد',
	'dimensions'           => 'The :attribute has invalid image dimensions.',
	'distinct'             => 'The :attribute field has a duplicate value.',
	'email'                => ':attribute باید یک فرمت ایمیل معتبر باشد',
	'ends_with'            => 'The :attribute must end with one of the following: :values',
	'exists'               => ':attribute از قبل ثیت نشده است',
	'file'                 => ':attribute باید یک فایل باشد',
	'filled'               => 'The :attribute field must have a value.',
	'gt'                   => [
		'numeric' => 'The :attribute must be greater than :value.',
		'file'    => 'The :attribute must be greater than :value kilobytes.',
		'string'  => 'The :attribute must be greater than :value characters.',
		'array'   => 'The :attribute must have more than :value items.',
	],
	'gte'                  => [
		'numeric' => 'The :attribute must be greater than or equal :value.',
		'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
		'string'  => 'The :attribute must be greater than or equal :value characters.',
		'array'   => 'The :attribute must have :value items or more.',
	],
	'image'                => ':attribute باید یک عکس باشد',
	'in'                   => ':attribute نا معتبر است',
	'in_array'             => ':attribute در :other وجود ندارد',
	'integer'              => ':attribute باید عدد باشد',
	'ip'                   => 'The :attribute must be a valid IP address.',
	'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
	'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
	'json'                 => 'The :attribute must be a valid JSON string.',
	'lt'                   => [
		'numeric' => 'The :attribute must be less than :value.',
		'file'    => 'The :attribute must be less than :value kilobytes.',
		'string'  => 'The :attribute must be less than :value characters.',
		'array'   => 'The :attribute must have less than :value items.',
	],
	'lte'                  => [
		'numeric' => 'The :attribute must be less than or equal :value.',
		'file'    => 'The :attribute must be less than or equal :value kilobytes.',
		'string'  => 'The :attribute must be less than or equal :value characters.',
		'array'   => 'The :attribute must not have more than :value items.',
	],
	'max'                  => [
		'numeric' => ':attribute نمی تواند بزرگتر از :max باشد',
		'file'    => ':attribute نمی تواند بزرگتر از :max کیلوبایت باشد',
		'string'  => ':attribute نمی تواند بیشتر از :max حرف داشته باشد',
		'array'   => ':attribute نمی تواند بزرگتر از :max آیتم باشد',
	],
	'mimes'                => ':attribute باید یک فایل با یکی از فرمت های :values باشد',
	'mimetypes'            => ':attribute باید یک فایل با یکی از فرمت های :values باشد',
	'min'                  => [
		'numeric' => ':attribute نمی تواند کمتر از :min باشد',
		'file'    => ':attribute باید حداقل از :min کیلوبایت باشد',
		'string'  => ':attribute باید حداقل از :min حرف داشته باشد',
		'array'   => ':attribute باید حداقل از :min آیتم باشد',
	],
	'not_in'               => 'The selected :attribute is invalid.',
	'not_regex'            => 'The :attribute format is invalid.',
	'numeric'              => ':attribute باید حتما عدد باشد',
	'present'              => 'The :attribute field must be present.',
	'regex'                => ':attribute فرمت معتبر ندارد',
	'required'             => ':attribute باید حتما وارد شود',
	'required_if'          => 'The :attribute field is required when :other is :value.',
	'required_unless'      => 'The :attribute field is required unless :other is in :values.',
	'required_with'        => 'The :attribute field is required when :values is present.',
	'required_with_all'    => 'The :attribute field is required when :values are present.',
	'required_without'     => 'The :attribute field is required when :values is not present.',
	'required_without_all' => 'The :attribute field is required when none of :values are present.',
	'same'                 => ':attribute با :other باید مثل هم باشند',
	'size'                 => [
		'numeric' => ':attribute باید :size باشد',
		'file'    => ':attribute باید :size کیلوبایت باشد',
		'string'  => ':attribute باید :size حرف داشته باشد',
		'array'   => ':attribute باید :size آیتم داشته باشد',
	],
	'starts_with'          => 'The :attribute must start with one of the following: :values',
	'string'               => 'The :attribute must be a string',
	'timezone'             => 'The :attribute must be a valid zone',
	'unique'               => ':attribute قبلا ثبت شده است',
	'uploaded'             => 'بارگذاری :attribute با خطا مواجه شده است',
	'url'                  => ':attribute فرمت معتبری ندارد',
	'uuid'                 => 'The :attribute must be a valid UUID.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [

        'newPassword' =>
        [
            'regex' => 'باید شامل حروف کوچک و بزرگ به همراه عدد باشد'
        ],

        'password_register' =>
        [
            'regex' => 'باید شامل حروف کوچک و بزرگ به همراه عدد باشد'
        ],

	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [

		'name_admin'                  => 'نام',
		'familyName_admin'            => 'نام خانوادگی',
		'birthday_admin'              => 'تاریخ تولد',
		'email_admin'                 => 'پست الکترونیکی',
		'nationalCode_admin'          => 'کد ملی',
        'city_admin'                  => 'شهر',
        'province_admin'              => 'استان',
		'address_admin'               => 'آدرس',
		'school_admin'                => 'مدرسه',
		'telePhone_admin'             => 'شماره تلفن منزل',
        'parentPhone_admin'           => 'شماره تلفن همراه والدین',
        'averageDown_admin'           => 'دو رقم سمت راست معدل',
        'averageUp_admin'             => 'دو رقم سمت چپ معدل',
        'student_mobile_edit_admin'   => 'شماره تلفن همراه دانش آموز',
        'grade_admin'                 => 'مقطع تخصیلی',
		'password_confirmation'       => 'تکرار کلمه عبور',
		'password_signup'             => 'کلمه عبور',
		'student_mobile'              => 'شماره تلفن همراه',
		'mobile_email'                => 'شماره تلفن همراه یا پست الکترونیکی',
		'mobile'                      => 'شماره تلفن همراه',
		'repeatPassword'              => 'تکرار رمز عبور',
		'titleGrade'                  => 'عنوان مقطع',
		'codeGrade'                   => 'کد مقطع',
		'urlGrade'                    => 'پارامتر مقطع',
		'titleOrientation'            => 'عنوان گرایش',
		'codeOrientation'             => 'کد گرایش',
		'urlOrientation'              => 'پارامتر گرایش',
		'type'                        => 'نوع',
		'lesson'                      => 'درس',
		'ratio'                       => 'ضریب',
		'urlLesson'                   => 'پارامتر درس',
		'codeLesson'                  => 'کد درس',
		'titleLesson'                 => 'عنوان درس',
		'fullName'                    => 'نام و نام خانوادگی',
        'newPassword_confirmation'    => 'تکرار رمزعبور',
        'newPassword'                 => 'رمز عبور جدید',
        'title'                       => 'عنوان',
        'price'                       => 'قیمت',
        'duration'                    => 'زمان آزمون',
        'activeDate'                  => 'تاریخ فعال شدن آزمون',
        'category'                    => 'دسته بندی',
        'gradeLessons'                => 'درس های آزمون',
        'answersheet'                 => 'پاسخنامه تشریحی',
        'orientation_admin'           => 'گرایش تحصیلی',
        'description'                 => 'توضیحات',
        'resultDate'                  => 'تاریخ اعلام نتایج آزمون',
        'activeTime'                  => 'زمان و تاریخ فعال شدن آزمون',
        'gradeLesson'                 => 'درس سوال',
        'hardness'                    => 'درجه سختی',
        'questionType'                => 'نوع سوال',
        'text'                        => 'صورت سوال',
        'optionOne'                   => 'گزینه اول',
        'optionTwo'                   => 'گزینه دوم',
        'optionThree'                 => 'گزینه سوم',
        'optionFour'                  => 'گزینه چهارم',
        'answer'                      => 'پاسخ صحیح',
        'photo'                       => 'عکس سوال',
        'answerImage'                 => 'عکس پاسخ تشریحی سوال',
        'description_question'        => 'توضیحات سوال',
        'code'                        => 'کد',
        'count'                       => 'تعداد دفعات استفاده',
        'value'                       => 'درصد تخفیف',
        'endDate'                     => 'تاریخ انقضا',
        'titleCategory'               => 'عنوان دسته بندی',
        'urlCategory'                 => 'پارامتر دسته بندی',
        'level'                       => 'سطح دسترسی',
        'username_admin'              => 'نام کاربری ادمین',
        'password_admin'              => 'رمز عبور',
        'password_admin_confirmation' => 'تکرار رمز عبور',
        'status'                      => 'وضعیت درخواست',
        'adminMessage'                => 'توضیحات پاسخ',
		'username'                    => 'نام کاربری',
		'mobile_email'                => 'شماره تلفن همراه یا پست الکترونیکی',
		'student_mobile'              => 'شماره تلفن همراه',
		'password'                    => 'رمز عبور',
		'password_register'           => 'رمز عبور',
		'password_register_confirmation' => 'تکرار رمز عبور',
        'forgetPassword'              => 'شماره تلفن همراه',
		'name'                        => 'نام',
		'familyName'                  => 'نام خانوادگی',
		'birthday'                    => 'تاریخ تولد',
		'email'                       => 'پست الکترونیکی',
		'nationalCode'                => 'کد ملی',
		'city'                        => 'شهر',
		'province'                    => 'استان',
		'address'                     => 'آدرس',
		'orientation'                 => 'گرایش تحصیلی',
		'grade'                       => 'مقطع تحصیلی',
		'school'                      => 'مدرسه',
		'telePhone'                   => 'شماره تلفن منزل',
		'parentPhone'                 => 'شماره تلفن همراه یکی از والدین',
		'averageUp'                   => 'دو رقم سمت چپ معدل',
		'averageDown'                 => 'دو رقم سمت راست معدل',
		'stdMessage'                  => 'توضیحات درخواست',
		'charge_value'                => 'مبلغ شارژ',
        'charge_code'                 => 'کد شگفت انگیز',
        'scholarshipImage'            => 'عکس کارنامه',
		'family'                      => 'نام خانوادگی',
        'gradeId'                     => 'مقطع تحصیلی',
        'orientationId'               => 'گرایش تحصیلی',
        'profileImage'                => 'عکس پروفایل',
        'oldPassword'                 => 'رمز عبور کنونی'
	],

];
