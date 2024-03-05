<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Likefoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'url',
        'id_user',
        'album_id'
    ];

    protected $table ='fotos';

    // Relasi nilai balik ke tabel user
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relasi ke tabel likefotos
    public function likefotos(){
        return $this->hasMany(Likefoto::class, 'id_foto', 'id');
    }

    // Relasi ke dalam tabel comment
    public function comments(){
        return $this->hasMany(Comment::class, 'id_foto', 'id');
    }
}
