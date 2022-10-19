<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    
    protected $fillable = ['titulo_guide', 'contenido_guide', 'image_guide', 'game_id'];

    //relacion 1:N con game
    public function game(){
        return $this->belongsTo(Game::class);
    }

    // Relacion 1:N con images
    public function image(){
        return $this->belongsTo(Image::class);
    }
}
