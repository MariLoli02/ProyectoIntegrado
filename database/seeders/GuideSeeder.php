<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guide::create([
            'titulo_guide' => 'Como conseguir arma Legendaria el Genjiroh',
            'contenido_guide' => 'Pistola inteligente.
            Dispara cuatro balas por disparo, el cargador es más grande y puedes apuntar hasta a seis blancos a la vez. Daño adicional de electricidad y posibilidad de Cortocircuito.
            Se puede conseguir en la mansión de Arasaka en North Oak, debes poder saltar la valla (con salto doble desde el seto se puede) y localizarla en una de las habitaciones. Se puede conseguir fuera de la misión de historia que te lleva a este lugar.',
            'game_id' => '1'
        ]);
        Guide::create([
            'titulo_guide' => 'La leyenda de la estrella',
            'contenido_guide' => '-Las podrás conseguir bebiendo las botellas normales de Sunset Sarsaparrilla. Al beberlas, hay una posibilidad (muy baja, pero la hay) de que en lugar de una chapa normal consigas una con estrella. En Eliteguias se tenía 64 botellas en el inventario, y al beberlas todas juntas se consiguieron 5 chapas con estrella. El número de chapas que consigas así ya dependerá únicamente de la suerte que tengas.   -En cierto momento (se supone que es aleatorio), mientras caminas por cualquier parte del mapa, te encontrarás con un hombre llamado Malcolm Holmes, el cual te dirá que te estuvo siguiendo y te explicará el valor de las chapas de estrella. Escucha todo lo que tiene que decir y cuando termine la conversación... mátalo (tranquilo, no perderás karma) para cogerle 6 chapas con estrella de su cadáver.   -Entre Nipton y el Autocine de Mojave al Sur, te encontrarás con Tomas, el cual hablará automáticamente contigo. Te dirá que fue atacado por una mujer que quería su collar de chapas con estrellas. Puedes convencerle para que te lo dé con nivel 50 de Conversación o simplemente mátalo y róbaselo. El collar vale por 7 chapas con estrella.',
            'game_id' => '2'
        ]);
        Guide::create([
            'titulo_guide' => 'Un hombre Loco',
            'contenido_guide' => 'Después de haber completado la misión de La meor defensa, seguirás a bordo del barco, así que pon rumbo a la nueva marca del mapa para comenzar este recuerdo tras una breve escena cuando llegues allí, a Gran Inagua.El primer objetivo será llegar a la salida de la selva, es decir, que tienes que bajarte del barco, escalar por las ruinas iniciales que hay en la costa y avanzar por la selva eliminando a los guardias sin que estos te vean para cumplir el objetivo opcional. Cuando te acerques a la zona de las casas en el puerto que te mostramos en Eliteguias con las imágenes de arriba, recibirás el nuevo objetivo de encontrar a Julien du Casse. No te molestes en buscarlo en las casas, por que se encuentra en el barco que está parado en el muelle.Cuando te acerques a la zona de las casas en el puerto que te mostramos en Eliteguias con las imágenes de arriba, recibirás el nuevo objetivo de encontrar a Julien du Casse. No te molestes en buscarlo en las casas, por que se encuentra en el barco que está parado en el muelle.
            Una vez dentro del barco ya deberías poder verlo sin ningún problema y sin necesidad de utilizar visión de águila. Ahora el objetivo lógicamente será matarlo, pero ten en cuenta que para la sincronización al 100% tienes que matarlo realizando un asesinato aéreo, por lo que deberás subirte a un mástil sin que te vea nadie y esperar el momento justo para saltar sobre él.
            Con esto verás una escena con la que habrás completado no solo este recuerdo sino toda la Secuencia 3 al completo.',
            'game_id' => '3'
        ]);
    }
}
