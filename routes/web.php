<?php

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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('producto',[App\Http\Controllers\ProductoController::class,'index'])->name('producto.index')->middleware(['can:producto.index','auth']);
Route::get('categoria',[App\Http\Controllers\CategoriaController::class,'index'])->name('categoria.index')->middleware(['can:categoria.index','auth']);

Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::prefix('users')
->middleware('auth')
->group(function(){
Route::get('create',[App\Http\Controllers\UserController::class,'create'])->name('users.create')->middleware('can:users.create');
Route::post('store',[App\Http\Controllers\UserController::class,'store'])->name('users.store')->middleware('can:users.create');
Route::get('index',[App\Http\Controllers\UserController::class,'index'])->name('users.index')->middleware('can:users.index');
Route::get('{user}',[App\Http\Controllers\UserController::class,'show'])->name('users.show')->middleware('can:users.show');
Route::get('{user}/edit',[App\Http\Controllers\UserController::class,'edit'])->name('users.edit')->middleware('can:users.edit');
Route::put('{user}',[App\Http\Controllers\UserController::class,'update'])->name('users.update')->middleware('can:users.update');
});
