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
    return view('auth.login');
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
Route::get('/vagas/{id}/{status}', 'VagasController@changeStatus')->name('vagas.status');
Route::delete('/selected-vagas', 'VagasController@deleteSelected')->name('vagas.deleteSelected');

Route::get('/candidatos', 'CandidatosController@index')->name('candidatos.index');
Route::get('/candidatos/create', 'CandidatosController@create')->name('candidatos.create');
Route::post('/candidatos/store', 'CandidatosController@store')->name('candidatos.store');
Route::get('/candidatos/{id}', 'CandidatosController@show')->name('candidatos.show');
Route::get('/candidatos/{id}/edit', 'CandidatosController@edit')->name('candidatos.edit');
Route::get('/candidatos/{id}/update', 'CandidatosController@update')->name('candidatos.update');
Route::delete('/candidatos/{id}/destroy', 'CandidatosController@destroy')->name('candidatos.destroy');
Route::get('/candidatos/{id}/candidatar', 'CandidatosController@candidatar')->name('candidatos.candidatar');

