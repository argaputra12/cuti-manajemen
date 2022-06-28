<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiCuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'jumlah_cuti_bersama',
        'jumlah_cuti_maksimum'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
