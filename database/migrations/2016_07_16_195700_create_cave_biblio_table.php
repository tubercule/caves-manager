<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaveBiblioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cave_biblio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cave_id')->unsigned();
            $table->integer('biblio_id')->unsigned();
            $table->string('comment');

            $table->foreign('cave_id')->references('id')->on('caves');
            $table->foreign('biblio_id')->references('id')->on('biblios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cave_biblio');
    }
}
