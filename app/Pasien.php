<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nama', 'tanggalLahir', 'noHp', 'deskripsiPenyakit', 'id_Gedung', 'id_kamar', 'id_Dokter'
    ];
}
