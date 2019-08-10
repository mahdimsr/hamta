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
			//mobile is set for username

			$table->bigIncrements('id');
			$table->string('fullName');
			$table->string('mobile');
			$table->string('password');
			$table->string('nationalCode')->nullable();
			$table->enum('verifyMobile', ['Y', 'N'])->default('N');
			$table->string('verifyCode')->nullable();
			$table->enum('verifyEmail', ['Y', 'N'])->default('N');
			$table->string('verifyToken')->nullable();
			$table->string('average')->nullable();
			$table->timestamp('birthday')->nullable();
			$table->string('school')->nullable();
			$table->string('homePhone')->nullable();
			$table->string('parentPhone')->nullable();
			$table->integer('wallet')->default(0);
			$table->integer('cityId')->nullable();
			$table->integer('orientationId')->nullable();
			$table->integer('gradeId')->nullable();
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
