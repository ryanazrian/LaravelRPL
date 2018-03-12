<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tambahDokter extends Model
{
    protected $fillable = [
        'nama', 'spesialis', 'noHp', 'email'
    ];
}
