<?php

use App\Http\Controllers\ProductoDosController;
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

Route::get('/productos', [ProductoDosController::class,'index'])->name('producto.index');



Route::get('/productos/registro', [ProductoDosController::class,'create'])->name('producto.create');

Route::post('/productos/store', [ProductoDosController::class,'store'])->name('producto.store');

Route::get('/productos/actualizar/{id}', [ProductoDosController::class,'edit'])->name('producto.edit');

Route::put('/productos/update/{id}', [ProductoDosController::class,'update'])->name('producto.update');

Route::delete('/productos/destroy/{id}', [ProductoDosController::class,'destroy'])->name('producto.destroy');


