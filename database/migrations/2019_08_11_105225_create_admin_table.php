<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAdminTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('parentId')->default(0);
			$table->string('fullName');
			$table->string('username');
			$table->string('password');
			$table->enum('level', ['A', 'B', 'C', 'D'])->default('B');
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
		Schema::dropIfExists('admin');
	}
}
