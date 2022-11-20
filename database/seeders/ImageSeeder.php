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
            'url' => 'imagesF/news_1.jpg',
            'imageable_id' => '1',
            'imageable_type' => 'App\Models\News'
        ]);
        Image::create([
            'url' => 'imagesF/news_2.jpg',
            'imageable_id' => '2',
            'imageable_type' => 'App\Models\News'
        ]);
        Image::create([
            'url' => 'imagesF/game_1.jpg',
            'imageable_id' => '1',
            'imageable_type' => 'App\Models\Game'
        ]);
        Image::create([
            'url' => 'imagesF/game_2.jpg',
            'imageable_id' => '2',
            'imageable_type' => 'App\Models\Game'
        ]);
        Image::create([
            'url' => 'imagesF/game_3.jpg',
            'imageable_id' => '3',
            'imageable_type' => 'App\Models\Game'
        ]);
    }
}
