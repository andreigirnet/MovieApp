<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
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

Route::get('/', [MovieController::class,'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class,'show'])->name('movies.show');

Route::get('/Tv-shows', [TvController::class,'index'])->name('Tv.index');
Route::get('/Tv-shows/{id}', [TvController::class,'show'])->name('Tv.show');

Route::get('/actors', [ActorController::class,'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorController::class,'index'])->name('actors.index');
Route::get('/actors/{id}', [ActorController::class,'show'])->name('actors.show');

