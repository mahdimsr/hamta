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
            $table->string('familyname')->nullable();
            $table->string('nationalcode')->nullable();
            $table->string('password');
            $table->string('mobile');
            $table->integer('verifymobile')->default(0);
            $table->string('email')->nullable();
            $table->integer('verifyemail')->default(0);
            $table->string('average')->nullable();
            $table->string('orientation')->nullable();
            $table->string('grade')->nullable();
            $table->string('school')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
			$table->date('birthday')->nullable();
			$table->string('telephone')->nullable();
			$table->string('parentphone')->nullable();
			$table->integer('wallet')->default(0);
			$table->string('verifyCode')->nullable();
			$table->string('verifyToken')->nullable();
			$table->integer('isActive')->default(0);
			$table->integer('isComplete')->default(0);
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
