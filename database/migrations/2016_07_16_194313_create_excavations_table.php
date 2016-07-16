<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcavationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excavations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cave_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leader');
            $table->string('comment');
            $table->timestamps();

            $table->foreign('cave_id')->references('id')->on('caves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('excavations');
    }
}
