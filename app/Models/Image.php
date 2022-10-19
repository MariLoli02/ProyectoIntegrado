<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['ruta'];


    // Relaciones 1:N con las demas tablas
    public function games(){
        return $this->hasMany(image::class);
    }
    public function news(){
        return $this->hasMany(News::class);
    }
    public function guides(){
        return $this->hasMany(Guide::class);
    }
}
