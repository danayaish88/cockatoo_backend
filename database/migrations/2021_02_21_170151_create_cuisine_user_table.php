<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisineUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('cuisine_name');
            $table->foreign('user_id')
                          ->references('id')->on('users')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->foreign('cuisine_name')
                          ->references('name')->on('cuisines')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['user_id', 'cuisine_name']);

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
        Schema::dropIfExists('cuisine_user');
    }
}
