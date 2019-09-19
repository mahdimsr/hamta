<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLessonTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lesson', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('parentId');
			$table->string('code')->default(0);
			$table->string('title');
			$table->string('description')->nullable();
			$table->string('url')->unique()->nullable();
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
		Schema::dropIfExists('lesson');
	}
}
