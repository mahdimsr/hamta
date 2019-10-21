<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateScholarshipTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scholarship', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('url');
			$table->integer('studentId');
			$table->integer('adminId')->default(0);
			$table->enum('status', ['ACCEPT', 'DECLINE', 'IN-PROGRESS', 'NOT-SEEN'])->default('NOT-SEEN');
			$table->text('stdMessage');
            $table->text('adminMessage')->nullable();
            $table->string('verifyImage')->nullable();
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
		Schema::dropIfExists('scholarship');
	}
}
