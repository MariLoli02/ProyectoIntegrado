<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id')->paginate(4);
        return view('admin.indexNews', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'unique:news,titulo_news', 'min:4'],
            'autor' => ['required', 'min:2'],
            'contenido' => ['required', 'min:100'],
            'estado' => ['required'],
            'image' => ['required', 'max:2048']
        ]);

        // guardo los datos de la noticia
        $news = new News;

        $titulo = ucfirst($request->titulo);
        $autor = ucfirst($request->autor);
        $contenido = ucfirst($request->contenido);

        $news->titulo_news = $titulo;
        $news->contenido_news = $contenido;
        $news->autor_news = $autor;
        $news->estado = $request->estado;

        $news->save();

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
        $news->image()->save($image);

        // vuelvo a la pagina de la tabla
        return redirect()->route('News.index')->with('info', 'Noticia Creada con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($news_id)
    {
        $news = News::find($news_id);
        return view('admin.editNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $news_id)
    {
        // Valido los datos recibidos por el formulario
        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'unique:news,titulo_news,'.$news_id],
            'autor' => ['required', 'min:2'],
            'contenido' => ['required', 'min:100'],
            'estado' => ['required'],
            'image' => ['nullable', 'image', 'max:2048']
        ]);

        $news = News::find($news_id);

        // Pongo la primera letra en mayuscula
        $titulo = ucfirst($request->titulo);
        $autor = ucfirst($request->autor);
        $contenido = ucfirst($request->contenido);


        // Actualizo los datos de la noticia
        $news->titulo_news = $titulo;
        $news->contenido_news = $contenido;
        $news->autor_news = $autor;
        $news->estado = $request->estado;

        $news->save();

        // compruebo si he recibido una imagen
        if ($request->hasFile('image')) {
            // Obtengo la url de la imagen antigua
            $imagen = $news->image->url;
            // Obtengo todos los datos de la img antigua
            $imagen_b = $news->image;
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
            $news->image()->save($image);
        }

        // vuelvo a la pagina de la tabla
        return redirect()->route('News.index')->with('info', 'Noticia Actualizada con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentro la noticia de la que recibo la id para eliminar
        $news = News::find($id);
        //dd($game);
        // guardo la ruta de la imagen del mismo
        $imagen = $news->image->url;
        // Datos de la img para borrarla de la bbdd
        $imagen_b = $news->image;
        //dd($imagen_b);
        // Elimino la imagen de la carpeta storage
        Storage::delete($imagen);
        // Elimino el juego
        $news->delete();
        // Elimino la img
        $imagen_b->delete();
        // vuelvo a la pagina de la tabla
        return redirect()->route('News.index')->with('info', 'Noticia Eliminada con Éxito');
    }

    public function indexUser()
    {
        $noticias = News::where('estado', 'Publicada')->orderBy('id', 'desc')->paginate(4);
        $images = Image::orderBy('id')->get();
        return view('users.indexNoticias', compact('noticias', 'images'));
    }
    
    public function cambiarEstado($news_id){
        // Busco la noticia de la que recibo el id
        $news = News::find($news_id);
        //dd($news);
        $estado = "Nada";

        // Compruebo el estado y lo cambio al contrario
        if($news->estado == "Borrador"){
            $estado = "Publicada";
        }
        
        if($news->estado == "Publicada"){
            $estado = "Borrador";
        }
        // Guardo el nuevo estado
        $news->estado = $estado;
        $news->save();

        // Mando un mensaje de que se ha realizado correctamente el cambio
        return redirect()->route('News.index')->with('info', 'Estado de la Noticia Actualizado con Éxito');
    }
}
