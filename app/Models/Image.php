<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // campos editables
    protected $fillable = ['url'];


    // Relacion poliomorfica
    public function imageable()
    {    //transformar a pero no especificamos a que
        return $this->morphTo();
    }
}
