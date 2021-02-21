<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNatureUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nature_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('nature_name');
            $table->foreign('user_id')
                          ->references('id')->on('users')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->foreign('nature_name')
                          ->references('name')->on('natures')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['user_id', 'nature_name']);

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
        Schema::dropIfExists('nature_user');
    }
}
