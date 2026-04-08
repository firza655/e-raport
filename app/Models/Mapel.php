<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';

    protected $fillable = ['nama', 'kode', 'guru_id'];

    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'guru_mapel');
    }
}