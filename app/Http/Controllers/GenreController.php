<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genre::orderBy('id')->paginate(4);
        return view('admin.indexGenres', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createGenre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valido los datos que recibo por el formulario
        $request->validate([
            'nombre' => ['required', 'min:3', 'unique:genres,nombre_genre'],
            'contenido' => ['required', 'min:10']
        ]);

        // Pongo la primera letra en mayuscula
        $nombre = ucfirst($request->nombre);
        $contenido = ucfirst($request->contenido);

        // Guardo los datos 
        Genre::create([
            'nombre_genre' => $nombre,
            'contenido_genre' => $contenido
        ]);

        // Me redirijo a la pagina principal con un mensaje de que se ha creado con exito
        return redirect()->route('Genre.index')->with('info', 'Genero Creado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($genre_id)
    {
        $genre = Genre::find($genre_id);
        return view('users.showGenre', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // Encuentro el genero del que recibo la id para editar
       $genre = Genre::find($id);
       
       return view('admin.editGenre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $genre_id)
    {
        // Valido los datos que recibo por el formulario
        $request->validate([
            'nombre' => ['required', 'min:3', 'unique:genres,nombre_genre,'.$genre_id],
            'contenido' => ['required', 'min:10']
        ]);

        // Encuentro el genero que estoy editando
        $genre = Genre::find($genre_id);

        // Pongo la primera letra en mayuscula
        $nombre = ucfirst($request->nombre);
        $contenido = ucfirst($request->contenido);

        // Guardo los nuevos datos
        $genre->update([
            'nombre_genre' => $nombre,
            'contenido_genre' => $contenido
        ]);

        // Me redirijo a la pagina principal con un mensaje de que se ha actualizado con exito
        return redirect()->route('Genre.index')->with('info', 'Genero Actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentro el genero del que recibo la id para eliminar
        $genre = Genre::find($id);

        // Elimino el registro de la bbdd
        $genre->delete();

        // Redirijo al usuario a la pagina principal
        return redirect()->route('Genre.index')->with('info', 'Genero Borrado con Éxito');
    }
}
