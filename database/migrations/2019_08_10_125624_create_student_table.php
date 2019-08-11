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
			$table->string('fullName')->nullable();
			$table->string('mobile');
            $table->string('password');
            $table->string('email')->nullable();
			$table->string('nationalCode')->nullable();
			$table->integer('verifymobile')->default(0);
			$table->string('verifyCode')->nullable();
			$table->integer('verifyemail')->default(0);
			$table->string('verifyToken')->nullable();
			$table->string('average')->nullable();
			$table->timestamp('birthday')->nullable();
			$table->string('school')->nullable();
			$table->string('homePhone')->nullable();
			$table->string('parentPhone')->nullable();
			$table->integer('wallet')->default(0);
			$table->integer('city')->nullable();
			$table->integer('orientation')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('isActive')->default(0);
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
