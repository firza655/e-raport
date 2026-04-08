<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use HasFactory;
    protected $table = 'gurus';

    protected $fillable = [
            'nama',
            'email',
            'nip',
            'alamat',
            'password',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapels()
{
    return $this->belongsToMany(Mapel::class, 'guru_mapel');
}
}
