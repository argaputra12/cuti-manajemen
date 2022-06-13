<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_cuti_id',
        'status_cuti',
        'alasan_cuti',
        'durasi_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
