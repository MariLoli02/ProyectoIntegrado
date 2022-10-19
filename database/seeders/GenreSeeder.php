<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Genre::create([
            'nombre_genre'=>'Acción',
            'contenido_genre'=>"Un videojuego de acción es un videojuego en el que el jugador debe usar su velocidad, destreza y tiempo de reacción. Entre los diversos géneros de videojuegos, el género de acción es el más amplio y abarcativo, englobando muchos subgéneros como videojuegos de lucha, videojuegos de disparos en primera persona, beat'em ups y videojuegos de plataformas."
        ]);
        Genre::create([
            'nombre_genre'=>'Aventura',
            'contenido_genre'=>"Los videojuegos de aventura son un género de videojuegos, caracterizados por la investigación, exploración, la solución de rompecabezas, la interacción con personajes del videojuego, y un enfoque en el relato en vez de desafíos basados en reflejos . Es importante observar que este término no tiene relación con las películas y novelas de aventura y no es indicativo del tema o del sujeto que trata."
        ]);
        Genre::create([
            'nombre_genre'=>'Cooperativo',
            'contenido_genre'=>"Un videojuego cooperativo es un tipo de videojuego que permite a los jugadores trabajar juntos en equipo para lograr un objetivo en común, en ausencia de competidores controlados por otro jugador. Usualmente son construidos como modificación de un videojuego para un único jugador, permitiéndose la posibilidad de soportar uno o más jugadores adicionales."
        ]);
        Genre::create([
            'nombre_genre'=>'Deporte',
            'contenido_genre'=>"Un videojuego de deportes es un videojuego de consola o de computadora que simula el campo de deportes tradicionales. Estos videojuegos son sumamente populares, el género incluye algunos de los videojuegos con más éxito de venta."
        ]);
        Genre::create([
            'nombre_genre'=>'FPS',
            'contenido_genre'=>"Un videojuego de disparos en primera persona o FPS (del inglés, first-person shooter) es un género de videojuegos que simula el uso de armas de fuego desde una perspectiva de primera persona. El género comparte rasgos comunes con otros juegos de disparos, que a su vez hacen que caiga bajo el título de juego de acción. Desde el inicio del género, los gráficos avanzados en 3D y pseudo-3D han desafiado el desarrollo de hardware, y los juegos multijugador han sido integrales."
        ]);
        Genre::create([
            'nombre_genre'=>'Lucha',
            'contenido_genre'=>"Un videojuego de lucha, pelea o combate, es un videojuego que se basa en manejar un luchador o un grupo de luchadores, ya sea dando golpes, usando poderes mágicos o armas (incluyendo las de fuego), arrojando objetos o aplicando llaves. Este género se podría encuadrar en el super-género de arcade, es decir es más importante la acción que la estrategia, aunque haya mucho de esta última."
        ]);
        Genre::create([
            'nombre_genre'=>'Multijugador',
            'contenido_genre'=>"Los videojuegos multijugador son aquellos que poseen cualquier modalidad de juego que permita la interacción de dos o más jugadores al mismo tiempo, ya sea de manera física en una misma consola, en 2 o más portátiles (incluyendo teléfonos móviles) mediante cables o conexión inalámbrica, o mediante servicios en línea u otro tipo de red con personas conectadas a la misma. Esta modalidad suele ser en tiempo real o por turnos."
        ]);
        Genre::create([
            'nombre_genre'=>'RPG',
            'contenido_genre'=>"Un videojuego de rol o juego de rol por computadora/ordenador, también llamado por simplificación juego de rol (JDR), o referido con la sigla inglesa RPG (role-playing game) o CRPG (computer role-playing game), es un género de videojuegos donde el jugador controla las acciones de un personaje (o de diversos miembros de un grupo) inmerso en algún detallado mundo. La mayoría de estos videojuegos tienen sus orígenes en juegos de rol de sobremesa1​ (incluyendo Dungeons & Dragons) y usan mucho de la misma terminología, escenarios y mecánicas de juego. "
        ]);
        Genre::create([
            'nombre_genre'=>'Simulación',
            'contenido_genre'=>"Los videojuegos de simulación son videojuegos que intentan recrear situaciones de la vida real. Los videojuegos de simulación reproducen sensaciones que en realidad no están sucediendo. Pretenden reproducir tanto las sensaciones físicas (velocidad, aceleración, percepción del entorno) y una de sus funciones es dar una experiencia real de algo que no está sucediendo para de esta forma no poner en riesgo la vida de alguien."
        ]);
    }
}
