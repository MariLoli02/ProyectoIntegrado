<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Elimino la carpeta de las imagenes en caso de que exista y la creo de nuevo
        Storage::deleteDirectory('imagesF');
        Storage::makeDirectory('imagesF');

        //Llamo a los seeder/ factory de las tablas que voy a tener
        \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'is_admin' => true,
            'email' => 'admin@email.com',
        ]);
        // Llamo a los seeder de cada tabla para los datos base
        $this->call(ImageSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(GuideSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
