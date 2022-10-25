<?php

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
    $images = Image::all();
    $noticias = News::latest()->take(4)->get();
    return view('welcome', compact('noticias', 'images'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $images = Image::all();
        $noticias = News::latest()->take(2)->get();
        return view('dashboard', compact('noticias', 'images'));
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->resource('/noticias', NewsController::class);
