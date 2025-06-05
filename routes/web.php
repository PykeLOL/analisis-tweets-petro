<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

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

Route::get('/', [TweetController::class, 'index'])->name('tweets.index');


Route::get('/tweets-actividad', [TweetController::class, 'actividadPorTiempo']);
Route::get('/sentimiento-respuestas', [TweetController::class, 'sentimientosRespuestas']);
Route::get('/sentimiento-por-genero', [TweetController::class, 'sentimientoPorGenero']);
Route::get('/usuarios-mas-comentan', [TweetController::class, 'usuariosMasComentan']);
Route::get('/sentimiento-tiempo', [TweetController::class, 'sentimientoPorTiempo']);
