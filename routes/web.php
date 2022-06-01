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


Route::get('/','HomeController@index')->middleware('auth');




// Route::get('/','LoginController@home');

// Route::get('/login','LoginController@login');


// Route::post('/register','RegisterController@store');

// Route::post('/login','LoginController@store');
