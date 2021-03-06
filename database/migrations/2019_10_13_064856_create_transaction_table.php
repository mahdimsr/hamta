<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateTransactionTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('transaction', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->enum('type', ['CHARGE', 'PURCHASE']);
                $table->integer('studentId');
                $table->enum('itemType', ['LESSON_EXAM'])->nullable();
                $table->integer('itemId')->nullable();
                $table->integer('price');
                $table->integer('discountId')->nullable();
                $table->integer('discountPrice')->nullable();
                $table->string('code')->nullable();
                $table->enum('status', ['IN-PROGRESS','FAILED','SUCCESS'])->default('IN-PROGRESS');
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

            Schema::dropIfExists('transaction');
        }

    }
