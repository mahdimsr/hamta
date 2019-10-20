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
	'after'                => ':attribute باید تاریخی بعد از :date باشد.',
	'after_or_equal'       => ':attribute باید روز :date یا بعد از آن باشد.',
	'alpha'                => ':attribute باید شامل حروف الفبا باشد.',
	'alpha_dash'           => ':attribute باید شامل حروف الفبا، اعداد، خط تیره ( - ) و زیر خط ( _ ) باشد.',
	'alpha_num'            => ':attribute باید شامل حروف و اعداد باشد.',
	'array'                => ':attribute باید آرایه باشد.',
	'before'               => ':attribute باید تاریخی قبل از :date باشد',
	'before_or_equal'      => ':attribute باید روز :date یا قبل از آن باشد.',
	'between'              => [
		'numeric' => ':attribute باید بین :max و :min باشد.',
		'file'    => ':attribute باید بین :max  و :min کیلوبایت باشد.',
		'string'  => ':attribute باید بین :max  و :min حرف باشد.',
		'array'   => ':attribute باید بین :max  و :min آیتم باشد.',
	],
	'boolean'              => 'The :attribute field must be true or false.',
	'confirmed'            => 'The :attribute confirmation does not match.',
	'date'                 => 'The :attribute is not a valid date.',
	'date_equals'          => 'The :attribute must be a date equal to :date.',
	'date_format'          => 'The :attribute does not match the format :format.',
	'different'            => ':attribute باید با :other متفاوت باشد.',
	'digits'               => ' :attribute باید حتما :digits رقم باشد',
	'digits_between'       => ':attribute باید بین :max و :min رقم باشد.',
	'dimensions'           => 'The :attribute has invalid image dimensions.',
	'distinct'             => 'The :attribute field has a duplicate value.',
	'email'                => ':attribute باید یک فرمت ایمیل معتبر باشد.',
	'ends_with'            => 'The :attribute must end with one of the following: :values',
	'exists'               => ':attribute از قبل ثیت نشده است.',
	'file'                 => ':attribute باید یک فایل باشد.',
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
	'image'                => ':attribute باید یک عکس باشد.',
	'in'                   => ':attribute نا معتبر است.',
	'in_array'             => ':attribute در :other وجود ندارد.',
	'integer'              => ':attribute باید عدد باشد.',
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
		'numeric' => ':attribute نمی تواند بزرگتر از :max باشد.',
		'file'    => ':attribute نمی تواند بزرگتر از :max کیلوبایت باشد.',
		'string'  => ':attribute نمی تواند بیشتر از :max حرف داشته باشد.',
		'array'   => ':attribute نمی تواند بزرگتر از :max آیتم باشد.',
	],
	'mimes'                => ':attribute باید یک فایل با یکی از فرمت های :values باشد.',
	'mimetypes'            => ':attribute باید یک فایل با یکی از فرمت های :values باشد.',
	'min'                  => [
		'numeric' => ':attribute نمی تواند کمتر از :min باشد.',
		'file'    => ':attribute باید حداقل از :min کیلوبایت باشد.',
		'string'  => ':attribute باید حداقل از :min حرف داشته باشد.',
		'array'   => ':attribute باید حداقل از :min آیتم باشد.',
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
	'same'                 => ':attribute با :other باید مثل هم باشند.',
	'size'                 => [
		'numeric' => ':attribute باید :size باشد.',
		'file'    => ':attribute باید :size کیلوبایت باشد',
		'string'  => ':attribute باید :size حرف داشته باشد',
		'array'   => ':attribute باید :size آیتم داشته باشد',
	],
	'starts_with'          => 'The :attribute must start with one of the following: :values',
	'string'               => 'The :attribute must be a string',
	'timezone'             => 'The :attribute must be a valid zone',
	'unique'               => ':attribute قبلا ثبت شده است',
	'uploaded'             => 'بارگذاری :attribute با خطا مواجه شده است.',
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

		'username' => [

			'required' => '.نام کاربری خود را وارد نمایید',

		],

		'mobile_email' => [

			'required' => '.شماره تلفن همراه یا پست الکترونیکی خود را وارد نمایید',

		],

		'student_mobile' => [

			'required' => '.شماره تلفن همراه خود را وارد نمایید',
			'unique'   => '.شماره تلفن همراه وارد شده قبلا در سیستم ثبت شده است',
			'digits'   => '.شماره تلفن همراه باید ۱۱ رقم باشد',
			'regex'    => '.شماره تلفن همراه وارد شده صحیح نیست',

		],

		'password' => [

			'required' => '.رمز عبور خود را وارد نمایید',

		],

		'password_register' => [

			'required'  => '.رمز عبور خود را وارد نمایید',
			'regex'     => '.رمز عبور باید شامل حروف کوچک و بزرگ به همراه عدد باشد',
			'min'       => '.رمز عبور باید حداقل 6 کاراکتر باشد',
			'confirmed' => '.رمز عبور وارد شده و تکرار آن همخوانی ندارند',

		],

		'password_register_confirmation' => [

			'required' => '.تکرار رمز عبور را وارد نمایید',

        ],

        'forgetPassword' => [

			'required' => '.پست الکترونیکی یا شماره تلفن همراه خود را وارد نمایید',

		],

		'name' => [

			'required' => 'نام خود را وارد نمایید.',

		],

		'familyName' => [

			'required' => 'نام خانوادگی خود را وارد نمایید.',

		],

		'birthday' => [

			'required' => 'تاریخ تولد خود را وارد نمایید.',

		],

		'email' => [

			'required' => 'پست الکترونیکی خود را وارد نمایید.',
            'email'    => 'پست الکترونیکی وارد شده صحیح نیست.',
            'unique'   => 'پست الکترونیکی وارد شده قبلا در سیستم ثبت شده است.'

		],

		'nationalCode' => [

			'required' => 'کد ملی خود را وارد نمایید.',
            'digits'   => 'کدملی باید 10 رقم باشد.',
            'unique'   => 'کد ملی وارد شده قبلا در سیستم ثبت شده است.'

		],

		'city' => [

			'required' => 'شهر خود را انتخاب نمایید.',
        ],

		'province' => [

			'required' => 'استان خود را انتخاب نمایید.',
        ],

		'address' => [

            'required' => 'آدرس خود را وارد نمایید.',
            'max'      => 'حداکثر باید 200 کاراکتر باشد.'

		],

		'orientation' => [

			'required' => 'گرایش تحصیلی خود را انتخاب نمایید.',

		],

		'grade' => [

			'required' => 'مقطع تحصیلی خود را انتخاب نمایید.',

		],

		'school' => [

			'required' => 'نام مدرسه خود را وارد نمایید.',

		],

		'telePhone' => [

			'required' => 'شماره تلفن منزل را وارد نمایید.',
			'digits'   => 'شماره تلفن منزل باید 8 رقم باشد.',

		],

		'parentPhone' => [

			'required' => 'شماره تلفن همراه یکی از والدین را وارد نمایید.',
			'digits'   => 'شماره تلفن همراه باید 11 رقم باشد.',
			'regex'    => 'شماره تلفن همراه وارد شده صحیح نیست.',

		],

		'averageUp' => [

			'required'       => 'دو رقم سمت چپ معدل خود را وارد نمایید.',
			'digits_between' => 'باید 1 یا 2 رقم باشد.',
			'min'            => 'حداقل می تواند 5 باشد.',
			'max'            => 'حداکثر می تواند 20 باشد.',
		],

		'averageDown' => [

			'required' => 'دو رقم سمت راست معدل خود را وارد نمایید.',
			'digits'   => 'باید 2 رقم باشد.',
			'min'      => 'حداقل می تواند 00 باشد.',
			'max'      => 'حداکثر می تواند 99 باشد.',
		],


		'stdMessage' => [

			'required' => 'توضیحات درخواست خود را وارد نمایید.',
			'between'  => 'متن درخواست می تواند بین :min تا :max کاراکتر باشد.',
        ],


		'charge_value' => [

			'required' => 'مبلغ شارژ را وارد نمایید.',
            'min'      => 'مبلغ شارژ حداقل باید :min تومان باشد.',
            'numeric'  => 'مبلغ شارژ فقط باید عدد باشد.'
        ],

        'charge_code' => [

            'exists'      => 'کد شگفت انگیز وارد شده صحیح نیست.',
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

		'name'                  => 'نام',
		'familyName'            => 'نام خانوادگی',
		'birthday'              => 'تاریخ تولد',
		'email'                 => 'پست الکترونیکی',
		'nationalCode'          => 'کد ملی',
		'city'                  => 'شهر',
		'address'               => 'آدرس',
		'school'                => 'مدرسه',
		'telePhone'             => 'شماره تلفن منزل',
		'parentPhone'           => 'شماره تلفن همراه والدین',
		'password_confirmation' => 'تکرار کلمه عبور',
		'password_signup'       => 'کلمه عبور',
		'student_mobile'        => 'شماره تلفن همراه',
		'mobile_email'          => 'شماره تلفن همراه یا پست الکترونیکی',
		'username'              => 'نام کاربری',
		'password'              => 'کلمه عبور',
		'titleGrade'            => 'عنوان مقطع',
		'codeGrade'             => 'کد مقطع',
		'urlGrade'              => 'آدرس مقطع',
		'titleOrientation'      => 'عنوان گرایش',
		'codeOrientation'       => 'کد گرایش',
		'urlOrientation'        => 'آدرس گرایش',
		'type'                  => 'نوع',
		'lesson'                => 'درس',
		'ratio'                 => 'ضریب',
		'urlLesson'             => 'لینک درس',
		'codeLesson'            => 'کد درس',
		'titleLesson'           => 'عنوان درس',
		'fullName'              => 'نام کامل',
		'repeatPassword'        => 'تکرار رمزعبور',

	],

];
