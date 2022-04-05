<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
        'id_user', 'tanggal', 'waktu', 'lokasi', 'suhu'
    ];
}


