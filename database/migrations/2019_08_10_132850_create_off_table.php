<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOffTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('off', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('offCode');
			$table->integer('value');
			$table->bigInteger('itemId')->default(0);
			$table->enum('type',['STUDENT','GENERAL']);
			$table->timestamp('startDate')->nullable();
			$table->timestamp('endDate')->nullable();
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
		Schema::dropIfExists('off');
	}
}
