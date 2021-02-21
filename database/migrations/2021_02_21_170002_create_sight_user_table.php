<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSightUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sight_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sight_id');
            $table->foreign('user_id')
                          ->references('id')->on('users')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->foreign('sight_id')
                          ->references('id')->on('sights')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->primary(['user_id', 'sight_id']);

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
        Schema::dropIfExists('sight_user');
    }
}
