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
        //creo la carpeta para las imagenes
        Storage::deleteDirectory('public/images');
        Storage::makeDirectory('public/images');

        //Llamo a los seeder/ factory de las tablas que voy a tener
         \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'is_admin' => true,
            'email' => 'admin@email.com',
         ]);
        $this->call(ImageSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(GenreSeeder::class); 
        $this->call(NewsSeeder::class); 
    }
}
