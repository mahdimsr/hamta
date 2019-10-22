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
                $table->integer('lessonExamId');
                $table->integer('transactionId')->default(0)->nullable();
                $table->integer('studentId');
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
