<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('restaurant_id');
            $table->foreign('user_id')
                          ->references('id')->on('users')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->foreign('restaurant_id')
                          ->references('id')->on('restaurants')
                          ->onDelete('cascade')->onUpdate('cascade')->string;
            $table->primary(['user_id', 'restaurant_id']);
              
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
        Schema::dropIfExists('restaurant_user');
    }
}
