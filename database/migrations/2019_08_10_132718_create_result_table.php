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
            $table->integer('blankAnswers')->default(0);
			$table->integer('correctAnswers')->default(0);
            $table->integer('wrongAnswers')->default(0);
            $table->enum('status',['IN-PROGRESS','COMPLETE']);
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
