<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1545647049ServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->increments('id');
                $table->string('service')->nullable();
                $table->double('price', 4, 2)->nullable();
                $table->double('price_the_evening', 4, 2)->nullable();
                $table->double('price_5_lessons', 4, 2)->nullable();
                $table->double('price_10_lessons', 4, 2)->nullable();
                $table->double('price_other', 4, 2)->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
