<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MyController::class, 'showmovies'])->name('home');

Route::get('/movie/add', [MyController::class, 'addfilm'])->name("movie.add");

Route::post('/movie/store', [MyController::class, 'storefilm'])->name("movie.store");

Route::get('/movie/show/{movie}', [MyController::class, 'show'])->name("movie.show");

Route::get('/movie/edit/{movie}', [MyController::class, 'edit'])->name("movie.edit");

Route::put('/movie/update/{movie}', [MyController::class, 'update'])->name("movie.update");

Route::delete('/movie/delete/{movie}', [MyController::class, 'delete'])->name("movie.delete");
