<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDateMgmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('excavations', function($table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });

        Schema::table('excavations', function($table) {
            $table->integer('start_date');
            $table->integer('end_date');
        });

        Schema::table('biblios', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('biblios', function (Blueprint $table) {
            $table->integer('date');
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
