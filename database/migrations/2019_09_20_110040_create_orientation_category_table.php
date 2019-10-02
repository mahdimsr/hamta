<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateOrientationCategoryTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('orientation_category', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->integer('orientationId');
                $table->integer('categoryId');
                $table->string('code');
                $table->integer('ratio')->default(0);
                $table->enum('type', ['EXPERT', 'GENERAL']);
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

            Schema::dropIfExists('orientation_category');
        }

    }
