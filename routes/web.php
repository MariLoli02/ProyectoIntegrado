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
    $noticias = News::latest()->take(4)->get();
    return view('welcome', compact('noticias'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $noticias = News::latest()->take(2)->get();
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


// RUTAS DE LOS ADMIN
Route::middleware([
    'middleware' => 'admin'
])->resource('/Games', GameController::class)->except('show', 'indexUser');

Route::middleware([
    'middleware' => 'admin'
])->resource('/Genre', GenreController::class)->except('show', 'indexUser');