<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Guide;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('id')->get();
        $guides = Guide::orderBy('id')->paginate(4);
        return view('admin.indexGuides', compact('guides', 'games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::orderBy('id')->get();
        return view('admin.createGuides', compact('games'));
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
            'titulo' => ['required', 'string', 'min:3', 'unique:guides,titulo_guide'],
            'contenido' => ['required', 'string', 'min:20'],
            'juego' => ['required'],
            'image' => ['required', 'image', 'max:2048']
        ]);

        // guardo los datos del juego
        $guide = new Guide;

        // Pongo la primera letra en mayuscula
        $titulo = ucfirst($request->titulo);
        $contenido = ucfirst($request->contenido);


        $guide->titulo_guide = $titulo;
        $guide->contenido_guide = $contenido;
        $guide->game_id = $request->juego;

        $guide->save();

        // Guardo la imagen
        // obtengo el nombre del archivo
        $filename = $request->file('image')->getClientOriginalName();
        // lo guardo en el disco 'public'en el directorio 'imagesF'
        $request->file('image')->storeAs('imagesF', $filename, 'public');
        // obtengo la url del archivo que guardaste
        $url = 'imagesF/' . $filename;
        // creo una instancia del modelo Image con el valor para el campo 'url'
        $image = new Image(['url' => $url]);
        // inserto la Image directamente desde el método de save() de la relación
        $guide->image()->save($image);

        // vuelvo a la pagina de la tabla
        return redirect()->route('Guide.index')->with('info', 'Guía Creada con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit($guide_id)
    {
        $games = Game::orderBy('id')->get(); 
        $guide = Guide::find($guide_id);
        //dd($game);
        return view('admin.editGuides', compact('games', 'guide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guide_id)
    {
        $guide = Guide::find($guide_id);

        // Valido los datos recibidos por el formulario
        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'unique:guides,titulo_guide,'.$guide_id],
            'contenido' => ['required', 'string', 'min:20'],
            'juego' => ['required'],
            'image' => ['nullable', 'image', 'max:2048']
        ]);

        // Pongo la primera letra en mayuscula
        $titulo = ucfirst($request->titulo);
        $contenido = ucfirst($request->contenido);


        // Actualizo los datos del juego
        $guide->update([
            'titulo_guide' => $titulo,
            'contenido_guide' => $contenido,
            'game_id' => $request->juego
        ]);


        // compruebo si he recibido una imagen
        if ($request->hasFile('image')) {
            // Obtengo la url de la imagen antigua
            $imagen = $guide->image->url;
            // Obtengo todos los datos de la img antigua
            $imagen_b = $guide->image;
            // elimino la imagen anterior del Storage
            Storage::delete($imagen);
            // Elimino la imagen de la bbdd
            $imagen_b->delete();
            // obtengo el nombre del archivo
            $filename = $request->file('image')->getClientOriginalName();
            // lo guardo en el disco 'public'en el directorio 'imagesF'
            $request->file('image')->storeAs('imagesF', $filename, 'public');
            // obtengo la url del archivo que guardé
            $url = 'imagesF/' . $filename;
            // creo una instancia del modelo Image con el valor para el campo 'url'
            $image = new Image(['url' => $url]);
            // inserto la Image directamente desde el método de save() de la relación
            $guide->image()->save($image);
        }

        // vuelvo a la pagina de la tabla
        return redirect()->route('Guide.index')->with('info', 'Guia Actualizada con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy($guide_id)
    {
         // Encuentro la guia del que recibo la id para eliminar
         $guide = Guide::find($guide_id);
         //dd($game);
         // guardo la ruta de la imagen del mismo
         $imagen = $guide->image->url;
         // Datos de la img para borrarla de la bbdd
         $imagen_b = $guide->image;
         //dd($imagen_b);
         // Elimino la imagen de la carpeta storage
         Storage::delete($imagen);
         // Elimino el juego
         $guide->delete();
         // Elimino la img
         $imagen_b->delete();
         // vuelvo a la pagina de la tabla
         return redirect()->route('Guide.index')->with('info', 'Guia Eliminada con Éxito');
    }

   
    public function showUser(Guide $guide){
        
    }

    public function indexUser(){
        $guides = Guide::orderBy('id')->get();
        $images = Image::orderBy('id')->get();
        return view('users.indexGuides', compact('guides', 'images'));
    }
}
