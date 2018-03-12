<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'nama_dokter', 'spesialis', 'noHp', 'email'
    ];
}
