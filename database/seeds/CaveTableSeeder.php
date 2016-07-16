<?php

use Illuminate\Database\Seeder;

class CaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caves')->insert(array('name' => 'Mas d\'Azil'));
        DB::table('caves')->insert(array('name' => 'Lascau'));
        DB::table('caves')->insert(array('name' => 'Chauvet'));
        DB::table('caves')->insert(array('name' => 'Combarelles'));
        DB::table('caves')->insert(array('name' => 'Cougnac'));
        DB::table('caves')->insert(array('name' => 'La Roche sur Yon'));
        DB::table('biblios')->insert(array(
        	'title' => 'Un superbe article',
        	'author' => 'Momo Lejay',
        	'revu' => 'Le Monde diplomatique',
        	'date' => '2016-07-01'));
        DB::table('biblios')->insert(array(
        	'title' => 'Le meilleur article',
        	'author' => 'Emilie Campmousse',
        	'revu' => 'Picsou magazine',
        	'date' => '2016-07-02'));
        DB::table('biblios')->insert(array(
        	'title' => "L'article qui parle de vrai archéologie",
        	'author' => 'Lars(ouille) Anderson',
        	'revu' => 'Cheval Mag',
        	'date' => '2010-10-10'));
    }
}
