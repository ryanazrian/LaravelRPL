<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    protected $fillable = [
        'namaKamar', 'gedung_id'
    ];
}
