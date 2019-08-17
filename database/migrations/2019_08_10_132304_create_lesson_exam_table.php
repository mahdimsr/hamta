<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLessonExamTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lesson_exam', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('gradeLessonId');
			$table->string('exm');
			$table->string('title');
			$table->string('description')->nullable();
			$table->integer('price')->default(0);
			$table->string('answerSheet')->nullable();
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
		Schema::dropIfExists('lesson_exam');
	}
}
