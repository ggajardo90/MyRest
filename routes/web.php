<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/register','RegisterController@show');

Route::post('/register','RegisterController@register');

Route::get('/login','LoginController@show');

Route::post('/login','LoginController@login');

Route::post('/home','LoginController@index');




// Route::get('/','LoginController@home');

// Route::get('/login','LoginController@login');


// Route::post('/register','RegisterController@store');

// Route::post('/login','LoginController@store');
