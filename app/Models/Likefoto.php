<?php

namespace App\Models;


use App\Models\Foto;
use App\Models\Likefoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likefoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto',
    ];

    protected $table = 'likefotos';

    //relasi balik ke table user
    public function foto(){
        return $this->belongTo(Foto::class, 'id_foto', 'id');
    }

    //relasi ke table like
    public function likefotos(){
        return $this->hasMany(Likefoto::class, 'id_foto', 'id');
    }
}