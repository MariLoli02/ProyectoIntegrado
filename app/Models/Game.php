<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre_game', 'plataforma', 'contenido_game', 'genre_id'];

     //relacion 1:N con guide
    public function guides(){
        return $this->hasMany(Guide::class);
    }

     //Relacion N:1 con genre 
     public function genres(){
        return $this->belongsTo(Genre::class);
    }

    // Relacion polimorfica a uno con images
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}
