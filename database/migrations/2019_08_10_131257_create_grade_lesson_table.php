<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateGradeLessonTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('grade_lesson', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->integer('gradeId');
                $table->integer('orientationId');
                $table->integer('lessonId');
                $table->integer('ratio');
                $table->enum('sort',['GENERAL','EXPERT']);
                $table->string('code')->nullable();
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

            Schema::dropIfExists('grade_lesson');
        }

    }
