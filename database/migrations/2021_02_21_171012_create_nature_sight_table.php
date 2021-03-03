<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNatureSightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nature_sight', function (Blueprint $table) {
            $table->string('nature_name');
            $table->unsignedBigInteger('sight_id');
            $table->foreign('nature_name')
                          ->references('name')->on('natures')
                          ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sight_id')
                          ->references('id')->on('sights')
                          ->onDelete('cascade')->onUpdate('cascade')->UNSIGNED;
            $table->primary(['nature_name', 'sight_id']);

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
        Schema::dropIfExists('nature_sight');
    }
}
