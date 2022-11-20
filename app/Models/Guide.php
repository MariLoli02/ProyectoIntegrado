<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    
    // Campos editables
    protected $fillable = ['titulo_guide', 'contenido_guide', 'game_id'];

    //relacion 1:N con game
    public function game(){
        return $this->belongsTo(Game::class);
    }

    // Relacion polimorfica a uno con images
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
