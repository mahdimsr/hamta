<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateGiftExamTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('gift_exam', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->string('exm')->nullable();
                $table->string('title');
                $table->string('description')->nullable();
                $table->string('answersheet')->nullable();
                $table->integer('duration');
                $table->timestamp('activeTime');
                $table->date('resultDate');
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

            Schema::dropIfExists('gift_exam');
        }

    }
