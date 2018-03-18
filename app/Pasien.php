<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nama', 'tanggalLahir', 'noHp', 'deskripsiPenyakit', 'id_Gedung', 'id_kamar', 'id_Dokter'
    ];

    public function pasien()
    {
        return $this->belongsTo('App\Doctor', 'id_Dokter');
    }

    public function kamar()
    {
        return $this->belongsTo('App\kamar', 'id_kamar');
    }

    public function gedung()
    {
        return $this->belongsTo('App\gedung', 'id_Gedung');
    }
}

