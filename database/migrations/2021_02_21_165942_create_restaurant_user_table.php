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
            $table->string('key');
            $table->foreign('user_id')
                          ->references('id')->on('users')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->foreign('key')
                          ->references('key')->on('restaurants')
                          ->onDelete('cascade')->onUpdate('cascade')->string;
            $table->primary(['user_id', 'key']);
              
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
