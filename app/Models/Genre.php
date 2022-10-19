<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_genre', 'contenido_genre'];

     //relacion N:M con game
     public function games(){
        return $this->belongsToMany(Game::class);
    }
}
