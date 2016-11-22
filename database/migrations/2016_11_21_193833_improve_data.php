<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImproveData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caves', function ($table) {
            $table->string('commune');
            $table->string('cadastre');
            $table->string('inv_patriache');
            $table->double('x_lambert');
            $table->double('y_lambert');
            $table->decimal('longitude', 10, 7);
            $table->decimal('lattitude', 10, 7);
            $table->decimal('altitude');
            $table->string('sequence');
        });
        Schema::table('biblios', function($table) {
            $table->string('titre');
            $table->decimal('volume');
            $table->decimal('issue');
            $table->string('pages');
            $table->string('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
