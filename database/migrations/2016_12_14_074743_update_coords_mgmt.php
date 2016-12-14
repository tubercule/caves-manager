<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCoordsMgmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caves', function($table) {
            $table->dropColumn('longitude');
            $table->dropColumn('lattitude');
            $table->char('longitude_hem', 1);
            $table->integer('longitude_deg');
            $table->integer('longitude_min');
            $table->double('longitude_sec');
            $table->char('lattitude_hem', 1);
            $table->integer('lattitude_deg');
            $table->integer('lattitude_min');
            $table->double('lattitude_sec');
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
