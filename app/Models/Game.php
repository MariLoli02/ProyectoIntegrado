<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre_game', 'plataforma', 'contenido_game', 'image_game'];

     //relacion 1:N con guide
    public function guides(){
        return $this->hasMany(Guide::class);
    }

     //Relacion N:M con genre un game tendrá varios genres
     public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    // Relacion 1:N con images
    public function image(){
        return $this->belongsTo(Image::class);
    }

}
