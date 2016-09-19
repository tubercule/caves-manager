<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCavePeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cave_period', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cave_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->string('comment');

            $table->foreign('cave_id')->references('id')->on('caves');
            $table->foreign('period_id')->references('id')->on('periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cave_period');
    }
}
