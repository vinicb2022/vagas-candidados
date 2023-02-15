<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/vagas', 'VagasController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vagas', 'VagasController@index')->name('vagas.index');
Route::get('/vagas/create', 'VagasController@create')->name('vagas.create');
Route::post('/vagas/store', 'VagasController@store')->name('vagas.store');
Route::get('/vagas/{id}', 'VagasController@show')->name('vagas.show');
Route::get('/vagas/{id}/edit', 'VagasController@edit')->name('vagas.edit');
Route::get('/vagas/{id}/update', 'VagasController@update')->name('vagas.update');
Route::delete('/vagas/{id}/destroy', 'VagasController@destroy')->name('vagas.destroy');
