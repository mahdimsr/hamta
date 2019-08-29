<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCartTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('studentId');
			$table->string('trk');
			$table->integer('price')->nullable();
			$table->enum('status',['NOT-PAID','PAID','WAITING-FOR-PAYMENT'])->default('NOT-PAID');
			$table->boolean('hasOff')->nullable();
			$table->bigInteger('offId')->nullable();
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
		Schema::dropIfExists('cart');
	}
}
