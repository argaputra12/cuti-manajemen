<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function riwayat_cutis()
    {
        return $this->hasMany('App\RiwayatCuti');
    }
}
