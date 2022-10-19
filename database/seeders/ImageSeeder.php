<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'ruta' => 'https://as01.epimg.net/meristation/imagenes/2022/10/15/noticias/1665835425_677237_1665835777_noticia_normal_recorte1.jpg'
        ]);
        Image::create([
            'ruta' => 'https://as01.epimg.net/meristation/imagenes/2022/10/14/noticias/1665773688_328872_1665773715_noticia_normal_recorte1.jpg'
        ]);
        Image::create([
            'ruta' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/capsule_616x353.jpg?t=1663663573'
        ]);
        Image::create([
            'ruta' => 'https://store-images.s-microsoft.com/image/apps.56995.13869736752294987.ca050464-c72a-476d-941d-c1c814c4213d.086da48d-2bd1-47fd-85eb-cf98f6225882?q=90&w=480&h=270'
        ]);
        Image::create([
            'ruta' => 'https://s1.gaming-cdn.com/images/products/261/orig/assassin-s-creed-iv-black-flag-pc-juego-ubisoft-connect-europe-cover.jpg?v=1649944074'
        ]);
    }
}
