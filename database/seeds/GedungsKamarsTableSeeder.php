<?php

use Illuminate\Database\Seeder;

class GedungsKamarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             
        // TABLE PROPINSI
        DB::table('gedungs')->insert(array(
            array('namaGedung' => 'Gedung I'),
            array('namaGedung' => 'Gedung VIP'),
            array('namaGedung' => 'Gedung VVIP'),
        ));
         
        // TABLE KOTA
        DB::table('kamars')->insert(array(
            array('namaKamar' => 'Melati', 'gedung_id' => 1),
            array('namaKamar' => 'Anggrek', 'gedung_id' => 1),
            array('namaKamar' => 'Potulaka', 'gedung_id' => 1),
            array('namaKamar' => 'Harendong', 'gedung_id' => 1),
            array('namaKamar' => 'Aster', 'gedung_id' => 1),

            array('namaKamar' => 'Alpine', 'gedung_id' => 2),
            array('namaKamar' => 'Angsa', 'gedung_id' => 2),
            array('namaKamar' => 'Astrapia', 'gedung_id' => 2),
            array('namaKamar' => 'Apung', 'gedung_id' => 2),

            array('namaKamar' => 'Corbetti', 'gedung_id' => 3),
            array('namaKamar' => 'Jacksoni', 'gedung_id' => 3),
            array('namaKamar' => 'Altaica', 'gedung_id' => 3),
            array('namaKamar' => 'Amoyensis', 'gedung_id' => 3),
            array('namaKamar' => 'Tigirs', 'gedung_id' => 3),
        ));
    }
}
