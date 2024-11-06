<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('usuarios', [HomeController::class, 'usuarios'])->name('usuarios.index');

Route::get('productos', [HomeController::class, 'productos'])->name('productos.index');

Route::get('ver-pdf', [HomeController::class, 'verPdf'])->name('ver.pdf');

Route::get('graficas', [HomeController::class, 'verGraficas'])->name('ver.graficas');