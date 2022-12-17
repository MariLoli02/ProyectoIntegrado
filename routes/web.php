<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\NewsController;
use App\Models\Image;
use App\Models\News;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $noticias = News::where('estado', 'Publicada')->orderBy('id', 'desc')->take(2)->get();
    return view('welcome', compact('noticias'));
});

Route::get('/about', function(){
    return view('about');
})->name('about');
Route::get('/privacidad', function(){
    return view('privacidad');
})->name('privacidad');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $noticias = News::where('estado', 'Publicada')->orderBy('id', 'desc')->take(2)->get();
        return view('dashboard', compact('noticias'));
    })->name('dashboard');
});




// RUTAS PARA LOS USUARIOS NORMALES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/noticias', [NewsController::class, 'indexUser'])->name('news.indexUser');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/games', [GameController::class, 'indexUser'])->name('games.indexUser');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/guides', [GuideController::class, 'indexUser'])->name('guides.indexUser');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/showGames/{game}', [GameController::class, 'show'])->name('games.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/showGenre/{genre}', [GenreController::class, 'show'])->name('genre.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/showGuide/{guide}', [GuideController::class, 'show'])->name('guide.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/showNews/{news}', [NewsController::class, 'show'])->name('news.show');




// RUTAS DE LOS ADMIN
Route::middleware([
    'middleware' => 'admin'
])->resource('/Games', GameController::class)->except('show', 'indexUser');

Route::middleware([
    'middleware' => 'admin'
])->resource('/Genre', GenreController::class)->except('show', 'indexUser');

Route::middleware([
    'middleware' => 'admin'
])->resource('/News', NewsController::class)->except('show', 'indexUser', 'cambiarEstado');

// Ruta para cambiar el estado
Route::middleware([
    'middleware' => 'admin'
])->put('News1/{news}', [NewsController::class, 'cambiarEstado'])->name('news.cambiarEstado');

Route::middleware([
    'middleware' => 'admin'
])->resource('/Guide', GuideController::class)->except('show', 'indexUser');