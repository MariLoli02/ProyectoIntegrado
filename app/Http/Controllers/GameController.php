<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Guide;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('id')->paginate(4);
        $generos = Genre::all();
        return view('admin.indexGames', compact('games', 'generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genre::all();
        return view('admin.createGames', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valido los datos recibidos por el formulario
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:games,nombre_game'],
            'contenido' => ['required', 'string', 'min:20'],
            'plataforma' => ['required'],
            'genero' => ['required'],
            'image' => ['required', 'image', 'max:2048']
        ]);

        // guardo los datos del juego
        $game = new Game;

        // Pongo la primera letra en mayuscula
        $nombre = ucfirst($request->nombre);
        $contenido = ucfirst($request->contenido);

        // Guardo los datos
        $game->nombre_game = $nombre;
        $game->plataforma = $request->plataforma;
        $game->contenido_game = $contenido;
        $game->genre_id = $request->genero;

        $game->save();

        // Guardo la imagen
        // obtengo el nombre del archivo
        $filename = $request->file('image')->getClientOriginalName();
        // lo guardo en el disco 'public'en el directorio 'imagesF'
        $request->file('image')->storeAs('imagesF', $filename, 'public');
        // obtengo la url del archivo que guardaste
        $url = 'imagesF/' . $filename;
        // creo una instancia del modelo Image con el valor para el campo 'url'
        $image = new Image(['url' => $url]);
        // inserto la Image directamente desde el m??todo de save() de la relaci??n
        $game->image()->save($image);


        // vuelvo a la pagina de la tabla
        return redirect()->route('Games.index')->with('info', 'Juego Creado con ??xito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show($game_id)
    {
        $game = Game::find($game_id);
        $guides = Guide::orderBy('id')->get();
        $generos = Genre::orderBy('id')->get();
        //dd($game);
        return view('users.showGames', compact('generos', 'guides', 'game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plataformas = ['Pc', 'Xbox', 'Nintendo', 'PlayStation'];
        $generos = Genre::orderBy('id')->get();
        $game = Game::find($id);
        //dd($game);
        return view('admin.editGames', compact('plataformas', 'generos', 'game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $game_id)
    {
        $game = Game::find($game_id);

        // Valido los datos recibidos por el formulario
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:games,nombre_game,' . $game->id],
            'contenido' => ['required', 'string', 'min:20'],
            'plataforma' => ['required'],
            'genero' => ['required'],
            'image' => ['nullable', 'image', 'max:2048']
        ]);

        // Pongo la primera letra en mayuscula
        $nombre = ucfirst($request->nombre);
        $contenido = ucfirst($request->contenido);


        // Actualizo los datos del juego
        $game->update([
            'nombre_game' => $nombre,
            'contenido_game' => $contenido,
            'plataforma' => $request->plataforma,
            'genre_id' => $request->genero
        ]);


        // compruebo si he recibido una imagen
        if ($request->hasFile('image')) {
            // Obtengo la url de la imagen antigua
            $imagen = $game->image->url;
            // Obtengo todos los datos de la img antigua
            $imagen_b = $game->image;
            // elimino la imagen anterior del Storage
            Storage::delete($imagen);
            // Elimino la imagen de la bbdd
            $imagen_b->delete();
            // obtengo el nombre del archivo
            $filename = $request->file('image')->getClientOriginalName();
            // lo guardo en el disco 'public'en el directorio 'imagesF'
            $request->file('image')->storeAs('imagesF', $filename, 'public');
            // obtengo la url del archivo que guard??
            $url = 'imagesF/' . $filename;
            // creo una instancia del modelo Image con el valor para el campo 'url'
            $image = new Image(['url' => $url]);
            // inserto la Image directamente desde el m??todo de save() de la relaci??n
            $game->image()->save($image);
        }

        // vuelvo a la pagina de la tabla
        return redirect()->route('Games.index')->with('info', 'Juego Actualizado con ??xito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentro el juego del que recibo la id para eliminar
        $game = Game::find($id);
        //dd($game);
        // guardo la ruta de la imagen del mismo
        $imagen = $game->image->url;
        // Datos de la img para borrarla de la bbdd
        $imagen_b = $game->image;
        //dd($imagen_b);
        // Elimino la imagen de la carpeta storage
        Storage::delete($imagen);
        // Elimino el juego
        $game->delete();
        // Elimino la img
        $imagen_b->delete();
        // vuelvo a la pagina de la tabla
        return redirect()->route('Games.index')->with('info', 'Juego Eliminado con ??xito');
    }

    public function indexUser()
    {
        $games = Game::orderBy('id')->paginate(4);
        return view('users.indexGames', compact('games'));
    }

}
