<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // campos editables
    protected $fillable = ['titulo_news', 'contenido_news', 'autor_news'];

    // Relacion polimorfica a uno con images
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
