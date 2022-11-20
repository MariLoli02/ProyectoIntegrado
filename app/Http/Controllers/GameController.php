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

        // creo un nuevo juego
        Game::create([
            'nombre_game' => $request->nombre,
            'plataforma' => $request->plataforma,
            'contenido_game' => $request->contenido,
            'genre_id' => $request->genero
        ]);


        // procedo a guardar la imagen
        // obtengo el nombre del archivo
        $filename = $request->file('image')->getClientOriginalName();
        // lo guardo en el disco public
        $request->file('image')->storeAs('imagesF', $filename, 'public');
        // obtengo la ruta donde la he guardado
        $url = Storage::url('imagesF/' . $filename);
        // creo una instancia del modelo Image con el valor para el campo url
        $game_last = Game::orderBy('created_at', 'desc')->take(1)->get();
        //dd($game_last);
        $image = new Image(['url' => $url, 'imageable_id' => $game_last]);
        // inserto la imagen directamente desde el metodo save() de la relacion entre ambos
        $game = new Game;
        $game->image()->save($image);

        return redirect()->route('Game.index')->with('info', 'Juego Creado con Éxito');
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
    public function destroy(Game $game)
    {
        //
    }

    public function indexUser()
    {
        $games = Game::orderBy('id')->get();
        $images = Image::orderBy('id')->get();
        return view('users.indexGames', compact('games', 'images'));
    }
}
