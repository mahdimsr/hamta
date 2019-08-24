<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGradeLessonTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grade_lesson', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('lessonId');
			$table->integer('gradeId');
			$table->integer('orientationId');
			$table->string('code');
			$table->integer('ratio')->default(1);
			$table->enum('type', ['EXPERT', 'GENERAL']);
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
		Schema::dropIfExists('grade_lesson');
	}
}
