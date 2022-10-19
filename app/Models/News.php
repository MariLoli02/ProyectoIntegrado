<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['titulo_news', 'contenido_news', 'autor_news', 'image_news'];

    // Relacion 1:N con images
    public function image(){
        return $this->belongsTo(Image::class);
    }
}
