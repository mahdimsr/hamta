<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateQuestionTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('question', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->integer('gradeLessonId');
                $table->string('questionType')->nullable();
                $table->string('text');
                $table->string('optionOne');
                $table->string('optionTwo');
                $table->string('optionThree');
                $table->string('optionFour');
                $table->string('answer');
                $table->enum('hardness', ['1', '2', '3', '4', '5']);
                $table->string('description')->nullable();
                $table->string('photo')->nullable();
                $table->string('answerImage')->nullable();
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

            Schema::dropIfExists('question');
        }

    }
