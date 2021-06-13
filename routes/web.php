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
    return view('welcome');
});

Auth::routes();

Route::resource('/libros', 'LibroController')->middleware('auth');

Route::resource('editoriales', 'EditorialController')->middleware('auth'); //El profe me hizo poner esto 

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/informacion', 'InfoController')->middleware('auth');