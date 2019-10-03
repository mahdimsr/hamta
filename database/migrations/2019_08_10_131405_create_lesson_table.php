<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateLessonTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('lesson', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->integer('parentId')->default(0);
                $table->string('code')->nullable();
                $table->string('title');
                $table->string('url')->nullable();
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

            Schema::dropIfExists('lesson');
        }

    }
