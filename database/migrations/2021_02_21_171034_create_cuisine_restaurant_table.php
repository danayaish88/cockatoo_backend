<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisineRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_restaurant', function (Blueprint $table) {
            $table->string('cuisine_name');
            $table->string('key');
            $table->foreign('cuisine_name')
                          ->references('name')->on('cuisines')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('key')
                          ->references('key')->on('restaurants')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['cuisine_name', 'key']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuisine_restaurant');
    }
}
