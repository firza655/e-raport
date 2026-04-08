<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Siswa extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = ['nama', 'nis', 'kelas_id', 'user_id'];

    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class);
    }

   public function user()
{
    return $this->belongsTo(User::class);
}


    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
