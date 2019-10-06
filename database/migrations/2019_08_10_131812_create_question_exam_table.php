<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateQuestionExamTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('question_exam', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->integer('questionId');
                $table->integer('examId');
                $table->enum('type', ['LESSON_EXAM', 'GIFT_EXAM']);
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

            Schema::dropIfExists('question_exam');
        }

    }
