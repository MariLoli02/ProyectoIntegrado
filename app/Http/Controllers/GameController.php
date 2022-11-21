<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
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
        $games = Game::orderBy('id')->get();
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

        $game->nombre_game = $request->nombre;
        $game->plataforma = $request->plataforma;
        $game->contenido_game = $request->contenido;
        $game->genre_id = $request->genero;

        $game->save();

        if ($request->hasFile('image')) {
            // obtienes el nombre del archivo
            $filename = $request->file('image')->getClientOriginalName();
            // lo guardas en el disco 'public'en el directorio 'images'
            $request->file('image')->storeAs('imagesF', $filename, 'public');
            // obtienes la url del archivo que guardaste
            $url = 'imagesF/' . $filename;
            // creas una instancia del modelo Image con el valor para el campo 'url'
            $image = new Image(['url' => $url]);
            // insertas la Image directamente desde el método de save() de la relación
            $game->image()->save($image);
        }

        // vuelvo a la pagina de la tabla
        return redirect()->route('Games.index')->with('info', 'Juego Creado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $generos = Genre::orderBy('id')->get();
        //dd($game);
        return view('users.showGames', compact('generos', 'game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
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
            //dd($imagen);
        // Elimino la imagen de la carpeta storage
        Storage::delete($imagen);
        // Elimino el juego
        $game->delete();
        // vuelvo a la pagina de la tabla
        return redirect()->route('Games.index')->with('info', 'Juego Eliminado con Éxito');
    }

    public function indexUser()
    {
        $games = Game::orderBy('id')->get();
        $images = Image::orderBy('id')->get();
        return view('users.indexGames', compact('games', 'images'));
    }
}
