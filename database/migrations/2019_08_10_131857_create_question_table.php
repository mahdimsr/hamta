<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateQuestionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('text');
			$table->string('optionOne');
			$table->string('optionTwo');
			$table->string('optionThree');
			$table->string('optionFour');
			$table->string('answer');
			$table->enum('hardness',['TOO_EASY','EASY','NORMAL','HARD','TOO_HARD']);
			$table->string('photo');
			$table->enum('type',['LESSON_EXAM','GIFT_EXAM','GENERAL'])->default('GENERAL');
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
		Schema::dropIfExists('question');
	}
}
