<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateResultTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('result', function(Blueprint $table)
		{
            $table->bigIncrements('id');
            $table->enum('type',['LESSONEXAM','GIFTEXAM']);
            $table->integer('studentId');
            $table->integer('examId');
            $table->integer('blankAnswers');
			$table->integer('correctAnswers');
			$table->integer('wrongAnswers');
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
		Schema::dropIfExists('result');
	}
}
