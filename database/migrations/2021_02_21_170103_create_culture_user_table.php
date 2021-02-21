<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCultureUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culture_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('culture_name');
            $table->foreign('user_id')
                          ->references('id')->on('users')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->foreign('culture_name')
                          ->references('name')->on('cultures')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['user_id', 'culture_name']);

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
        Schema::dropIfExists('culture_user');
    }
}
