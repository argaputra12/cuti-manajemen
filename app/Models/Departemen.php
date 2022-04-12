<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(User::class);
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
