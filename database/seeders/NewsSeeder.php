<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            "titulo_news" => "Gotham Knights a 30 fps y sin modo cooperativo",
            "contenido_news" => "Qué extraña está resultando esta generación de consolas. Parece estancada en un eterno arranque (como la serie de Los Anillos de Poder). A la imposibilidad en muchas ocasiones de hacerse con una máquina debido a la crisis de componentes, a prácticamente nula presencia de juegos imposibles en la generación anterior, pasando por lo que nos incumbe, funcionalidades prometidas como más resolución o mayor rendimiento, que han resultado ser como Superman y Clark Kent (o los protas de Lady Halcon), no hay manera de verlos juntos.
            En Discord se ha liado cuando Fleur Marty, productora ejecutiva del estudio de desarrollo, ha comentado que el juego llegaría a consolas capado a 30 fps. Aunque la explicación resulta comprensible, en un juego con fuerte componente cooperativo es la mejor forma de mantener la estabilidad, los comentarios demuestran que distan de complacer a la comunidad. Y puede que el berrinche también esté bien fundado. ¿No habría sido deseable una opción de 60 fps cuando jugamos solos? Parece que no desde los responsables del juego.
            Para redondear la jugada, dicho cooperativo a 4 no estará de salida, sino que llegará a finales de noviembre, lo que ha aumentado los fuegos aún más. Y también hay que intentar ser comprensibles aquí. Habrá que suponer que era un sacrificio necesario para que Gotham Knights llegara lo más pulido y sólido posible. Desde aquí os recomendamos dos cosas para quedaros más tranquilos: leer nuestras primeras impresiones sobre el juego, y los libros Sangre, sudor y pixeles y Press Reset, de Jason Schreier. Nada como sumergirse en sus tormentosas páginas para entender un poco mejor lo complejo que es ese milagro que es hacer videojuegos.",
            "autor_news" => "Jose María Villalobos",
            "image_news" => "1"
        ]);

        News::create([
            "titulo_news" => "Nvidia cancela la nueva RTX 4080 GB de 12 GB para no causar confusión entre los usuarios",
            "contenido_news" => "Así, y tal y como explicaba Nvidia con el anuncio de su nueva serie RTX 40, el modelo hasta ahora tope de gama en el lanzamiento de cada nueva familia (el modelo XX80), llegaría al mercado en dos versiones diferentes, una con 12 GB de memoria y otra con 16 GB, con la más potente RTX 4090 como nuesvo buque insignia. Finalmente, y con el fin de evitar confusión entre los usuarios de la marca, Nvidia pondrá únicamente a la venta el modelo RTX 4080 de 16 GB, con un precio recomendado de 1.199 euros.
            Con dicho movimiento, la gama RTX 40 se quedará con dos modelos de lanzamiento, la RTX 4090 (el modelo más potente y caro) y, justo por debajo, la RTX 4080. Por el momento no hay noticias de un posible cambio de nombre para el modelo de cancelado de 12 GB de la RTX 4080, aunque es más que probable que lleguen nuevos modelos de acceso, ¿quizás aprovechando el hueco que deja libre la RTX 4080 de 12 GB?
            Recientemente se confirmaba el enorme tamaño de la nueva RTX 4090 de Nvidia, comparable al de una Xbox Series S, con unas medidas verdaderamente exageradas para tratarse de una GPU y que no todas las cajas de PC podrán albergar en su interior.",
            "autor_news" => "Cristian Ciuraneta",
            "image_news" => "2"
        ]);
    }
}
