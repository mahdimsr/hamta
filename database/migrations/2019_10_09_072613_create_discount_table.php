<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;


    class CreateDiscountTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('discount', function(Blueprint $table)
            {

                $table->bigIncrements('id');
                $table->string('code');
                $table->integer('value');
                $table->enum('type', ['GENERAL','STUDENT','EXAM']);
                $table->date('endDate');
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

            Schema::dropIfExists('discount');
        }

    }
