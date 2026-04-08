<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ✅ Tambahkan relasi ke model Siswa
    public function siswa()
    {
         return $this->hasOne(Siswa::class, 'user_id');
    }
    public function nilai()
{
    return $this->hasMany(Nilai::class, 'user_id');
}
public function kelas()
{
    return $this->siswa->kelas(); // asumsi relasi siswa → kelas
}
}
