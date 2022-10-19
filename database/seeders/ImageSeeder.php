<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Image::create([
            'ruta' => 'imagesF/news_1.jpg'
        ]);
        Image::create([
            'ruta' => 'imagesF/news_2.jpg'
        ]);
        Image::create([
            'ruta' => 'imagesF/game_1.jpg'
        ]);
        Image::create([
            'ruta' => 'imagesF/game_2.jpg'
        ]);
        Image::create([
            'ruta' => 'imagesF/game_3.jpg'
        ]);
    }
}
