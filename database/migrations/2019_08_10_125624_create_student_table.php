<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateStudentTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student', function(Blueprint $table)
		{
			$table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('familyName')->nullable();
            $table->string('nationalCode')->nullable();
            $table->string('password');
            $table->string('mobile');
            $table->boolean('mobileVerified')->default(0);
            $table->string('mobileToken')->nullable();
            $table->string('email')->nullable();
            $table->boolean('emailVerified')->default(0);
            $table->string('emailToken')->nullable();
            $table->string('average')->nullable();
            $table->integer('orientationId')->nullable();
            $table->integer('gradeId')->nullable();
            $table->string('school')->nullable();
            $table->integer('cityId')->nullable();
            $table->string('address')->nullable();
			$table->date('birthday')->nullable();
			$table->string('telePhone')->nullable();
			$table->string('parentPhone')->nullable();
			$table->integer('wallet')->default(0);
            $table->string('profileImage')->nullable();
			$table->boolean('isComplete')->default(0);
            $table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('student');
	}
}
