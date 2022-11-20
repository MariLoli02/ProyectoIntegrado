<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'nombre_game' => 'Cyberpunk 2077',
            'plataforma' => 'Pc',
            'contenido_game' => 'Cyberpunk 2077 para PC es un shooter en primera persona, pero uno distinto al resto. Ambientado en un estado libre distópico de California, las reglas de la nación y del estado ya no son aplicadas. En cambio, jugando como un mercenario llamado V, el jugador debe abrirse paso por la ciudad, alcanzando sus objetivos y luchando contra enemigos a medida que avanza.',
            'genre_id' => '1'
        ]);
        Game::create([
            'nombre_game' => 'Fallout: New Vegas',
            'plataforma' => 'PlayStation',
            'contenido_game' => 'Bienvenido a Las Vegas. New Vegas.
            Es una de esas ciudades en las que cavas tu propia tumba antes de que te peguen un tiro en la cabeza para dejarte morir solo… y eso es antes de que las cosas se pongan realmente feas. Es una ciudad de soñadores y forajidos que se está desgarrando por la lucha entre las facciones que ansían hacerse con el control total de este oasis en pleno desierto. Es un lugar donde las personas apropiadas con el armamento adecuado pueden hacer historia, y de paso hacer algo más que un par de enemigos. A medida que luchas para abrirte camino a lo largo de las abrasadoras tierras baldías de Mojave, la colosal Presa Hoover y la deslumbrante zona de Vegas Strip, conocerás a un pintoresco elenco de personajes, facciones hambrientas de poder, armas especiales, criaturas mutadas y mucho más. Escoge tu bando en la inminente guerra o declara que “el ganador se lo queda todo” y corónate Rey de New Vegas en esta secuela del juego del año 2008, Fallout 3. Disfruta de tu estancia',
            'genre_id' => '2'
        ]);
        Game::create([
            'nombre_game' => "Assassin's Creed IV: Black Flag",
            'plataforma' => 'Pc',
            'contenido_game' => 'Año 1715. Los piratas dominaban todo el Caribe y habían establecido su propio gobierno en el que la corrupción, la codicia y la crueldad eran las únicas leyes. Entre estos hombres destacaba un joven y altivo capitán llamado Edward Kenway. Su lucha por conseguir la gloria le granjeó el respeto de leyendas como Barbanegra, pero también le sumergió de lleno en la histórica lucha entre Assassins y templarios, una lucha que amenazaba con destruir todo lo que los piratas habían creado. Bienvenidos a la era de oro de los piratas.',
            'genre_id' => '2'
        ]);
    }
}
