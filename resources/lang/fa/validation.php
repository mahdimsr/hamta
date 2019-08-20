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

	'accepted'             => 'The :attribute must be accepted.',
	'active_url'           => 'The :attribute is not a valid URL.',
	'after'                => 'The :attribute must be a date after :date.',
	'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
	'alpha'                => 'The :attribute may only contain letters.',
	'alpha_dash'           => 'The :attribute may only contain letters, numbers, dashes and underscores.',
	'alpha_num'            => 'The :attribute may only contain letters and numbers.',
	'array'                => 'The :attribute must be an array.',
	'before'               => 'The :attribute must be a date before :date.',
	'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
	'between'              => [
		'numeric' => 'The :attribute must be between :min and :max.',
		'file'    => 'The :attribute must be between :min and :max kilobytes.',
		'string'  => 'The :attribute must be between :min and :max characters.',
		'array'   => 'The :attribute must have between :min and :max items.',
	],
	'boolean'              => 'The :attribute field must be true or false.',
	'confirmed'            => 'The :attribute confirmation does not match.',
	'date'                 => 'The :attribute is not a valid date.',
	'date_equals'          => 'The :attribute must be a date equal to :date.',
	'date_format'          => 'The :attribute does not match the format :format.',
	'different'            => 'The :attribute and :other must be different.',
	'digits'               => ' :attribute باید حتما :digits رقم باشد',
	'digits_between'       => 'The :attribute must be between :min and :max digits.',
	'dimensions'           => 'The :attribute has invalid image dimensions.',
	'distinct'             => 'The :attribute field has a duplicate value.',
	'email'                => 'The :attribute must be a valid email address.',
	'ends_with'            => 'The :attribute must end with one of the following: :values',
	'exists'               => 'The selected :attribute is invalid.',
	'file'                 => 'The :attribute must be a file.',
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
	'image'                => 'The :attribute must be an image.',
	'in'                   => 'The selected :attribute is invalid.',
	'in_array'             => 'The :attribute field does not exist in :other.',
	'integer'              => 'The :attribute must be an integer.',
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
		'numeric' => 'The :attribute may not be greater than :max.',
		'file'    => 'The :attribute may not be greater than :max kilobytes.',
		'string'  => 'The :attribute may not be greater than :max characters.',
		'array'   => 'The :attribute may not have more than :max items.',
	],
	'mimes'                => 'The :attribute must be a file of type: :values.',
	'mimetypes'            => 'The :attribute must be a file of type: :values.',
	'min'                  => [
		'numeric' => 'The :attribute must be at least :min.',
		'file'    => 'The :attribute must be at least :min kilobytes.',
		'string'  => 'The :attribute must be at least :min characters.',
		'array'   => 'The :attribute must have at least :min items.',
	],
	'not_in'               => 'The selected :attribute is invalid.',
	'not_regex'            => 'The :attribute format is invalid.',
	'numeric'              => 'فیلد :attribute باید حتما عدد باشد.',
	'present'              => 'The :attribute field must be present.',
	'regex'                => 'The :attribute format is invalid.',
	'required'             => 'فیلد :attribute نمی تواند خالی باشد.',
	'required_if'          => 'The :attribute field is required when :other is :value.',
	'required_unless'      => 'The :attribute field is required unless :other is in :values.',
	'required_with'        => 'The :attribute field is required when :values is present.',
	'required_with_all'    => 'The :attribute field is required when :values are present.',
	'required_without'     => 'The :attribute field is required when :values is not present.',
	'required_without_all' => 'The :attribute field is required when none of :values are present.',
	'same'                 => 'The :attribute and :other must match.',
	'size'                 => [
		'numeric' => 'The :attribute must be :size.',
		'file'    => 'The :attribute must be :size kilobytes.',
		'string'  => 'The :attribute must be :size characters.',
		'array'   => 'The :attribute must contain :size items.',
	],
	'starts_with'          => 'The :attribute must start with one of the following: :values',
	'string'               => 'The :attribute must be a string.',
	'timezone'             => 'The :attribute must be a valid zone.',
	'unique'               => ' :attribute قبلا ثبت شده است',
	'uploaded'             => 'The :attribute failed to upload.',
	'url'                  => 'The :attribute format is invalid.',
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

			'required' => 'نام کاربری خود را وارد نمایید.',

        ],

		'mobile_email' => [

            'required' => 'شماره تلفن همراه یا پست الکترونیکی خود را وارد نمایید.',

        ],

        'student_mobile' => [

            'required' => 'شماره تلفن همراه خود را وارد نمایید.',
            'unique' => 'شماره تلفن همراه وارد شده قبلا در سیستم ثبت شده است.',
            'digits' => 'شماره تلفن همراه باید ۱۱ رقم باشد.',

        ],

		'password' => [

			'required' => 'رمز عبور خود را وارد نمایید.',

        ],

        'password_register' => [

            'required' => 'رمز عبور خود را وارد نمایید.',
            'regex'     =>'رمز عبور باید شامل حروف کوچک و بزرگ به همراه عدد باشد.',
            'min'     =>'رمز عبور باید حداقل 6 کاراکتر باشد.',
            'confirmed' =>'رمز عبور وارد شده و تکرار آن همخوانی ندارند.'

        ],

        'password_confirmation' => [

            'required' => 'تکرار رمز عبور را وارد نمایید.',

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
            'email'    => 'پست الکترونیکی وارد شده صحیح نیست.'

        ],

        'nationalCode' => [

            'required' => 'کد ملی خود را وارد نمایید.',
            'digits'   => 'کدملی باید 10 رقم باشد.'

        ],

        'city' => [

			'required' => 'شهر خود را انتخاب نمایید.'
        ],

        'address' => [

			'required' => 'آدرس خود را وارد نمایید.',

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

            'required' => 'شماره تلفن همراه والدین را وارد نمایید.',
            'digits'   => 'شماره تلفن همراه باید 11 رقم باشد.'

        ],

        'averageUp' => [

            'required' => 'دو رقم سمت چپ معدل خود را وارد نمایید.',
            'digits_between'   => 'باید 1 یا 2 رقم باشد.',
            'min'      => 'حداقل می تواند 5 باشد.',
            'max'      => 'حداکثر می تواند 20 باشد.',
        ],

        'averageDown' => [

            'required' => 'دو رقم سمت راست معدل خود را وارد نمایید.',
            'digits'   => 'باید 2 رقم باشد.',
            'min'      => 'حداقل می تواند 00 باشد.',
            'max'      => 'حداکثر می تواند 99 باشد.',
        ],


        'stdMessage' => [

            'required' => 'توضیحات درخواست خود را وارد نمایید.',
            'between'   => 'متن باید بین :min تا :max کاراکتر باشد. ',
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

        'name'=>'نام',
        'familyName'=>'نام خانوادگی',
        'birthday'=>'تاریخ تولد',
        'email'=>'پست الکترونیکی',
        'nationalCode'=>'کد ملی',
        'city'=>'شهر',
        'address'=>'آدرس',
        'school'=>'مدرسه',
        'telePhone'=>'شماره تلفن منزل',
        'parentPhone'=>'شماره تلفن همراه والدین',
        'password_confirmation' => 'تکرار کلمه عبور',
        'password_signup'       => 'کلمه عبور',
        'studentmobile'         => 'شماره تلفن همراه',
        'mobile-email'          => 'شماره تلفن همراه یا پست الکترونیکی',
		'username'              => 'نام کاربری',
		'password'              => 'کلمه عبور',
		'titleGrade'            => 'عنوان مقطع',
		'codeGrade'             => 'کد مقطع',
		'urlGrade'              => 'آدرس مقطع',
		'titleOrientation'      => 'عنوان گرایش',
		'codeOrientation'       => 'کد گرایش',
		'urlOrientation'        => 'آدرس گرایش',

	],

];
