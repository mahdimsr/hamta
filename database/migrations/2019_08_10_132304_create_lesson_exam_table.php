<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateLessonExamTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('lesson_exam', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->string('exm')->nullable();
                $table->string('title');
                $table->string('description')->nullable();
                $table->string('answersheet')->nullable();
                $table->integer('price')->nullable()->default(0);
                $table->date('activeDate')->nullable();
                $table->integer('duration')->nullable();
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

            Schema::dropIfExists('lesson_exam');
        }
    }
