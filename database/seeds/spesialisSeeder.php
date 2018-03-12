<?php

use Illuminate\Database\Seeder;

class spesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spesialiss')->insert(array(
            array('spesialis' => 'Spesialis Penyakit Dalam'),
            array('spesialis' => 'Spesialis Anak'),
            array('spesialis' => 'Spesialis Jantung'),
            array('spesialis' => 'Spesialis THT'),
            array('spesialis' => 'Spesialis Kandungan'),
        ));
         
    }
}
