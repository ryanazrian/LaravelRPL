<?php
 
class AllSeeder extends Seeder {
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        // TABLE PROPINSI
        DB::table('gedungs')->insert(array(
            array('gedungs' => 'Gedung I'),
            array('gedungs' => 'Gedung VIP'),
            array('gedungs' => 'Gedung VVIP'),
        ));
         
        // TABLE KOTA
        DB::table('kamars')->insert(array(
            array('kamars' => 'Melati', 'gedung_id' => 1),
            array('kamars' => 'Anggrek', 'gedung_id' => 1),
            array('kamars' => 'Potulaka', 'gedung_id' => 1),
            array('kamars' => 'Harendong', 'gedung_id' => 1),
            array('kamars' => 'Aster', 'gedung_id' => 1),

            array('kamars' => 'Alpine', 'gedung_id' => 2),
            array('kamars' => 'Angsa', 'gedung_id' => 2),
            array('kamars' => 'Astrapia', 'gedung_id' => 2),
            array('kamars' => 'Apung', 'gedung_id' => 2),

            array('kamars' => 'Corbetti', 'gedung_id' => 3),
            array('kamars' => 'Jacksoni', 'gedung_id' => 3),
            array('kamars' => 'Altaica', 'gedung_id' => 3),
            array('kamars' => 'Amoyensis', 'gedung_id' => 3),
            array('kamars' => 'Tigirs', 'gedung_id' => 3),
        ));
    }
 
}