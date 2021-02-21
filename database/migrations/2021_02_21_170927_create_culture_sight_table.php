<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCultureSightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culture_sight', function (Blueprint $table) {
            $table->string('culture_name');
            $table->unsignedBigInteger('sight_id');
            $table->foreign('culture_name')
                          ->references('name')->on('cultures')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sight_id')
                          ->references('id')->on('sights')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->primary(['culture_name', 'sight_id']);

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
        Schema::dropIfExists('culture_sight');
    }
}
