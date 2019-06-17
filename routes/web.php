<?php

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
Route::get('/login', 'Auth\GoogleController@Login');
Route::get('/logout', 'Auth\GoogleController@Logout');
Route::get('/callback', 'Auth\GoogleController@LoginCallback');

//Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::resource('aulas','AulasController');
    Route::get('aulas/delete/{id}','AulasController@destroy')->name('aulas.destroy');
    Route::post('aulas/{id}','AulasController@update')->name('aulas.update');
    
    Route::resource('datas','AulasDatasController');
    Route::get('datas/delete/{id}','AulasDatasController@destroy')->name('datas.destroy');
    Route::post('datas/{id}','AulasDatasController@update')->name('datas.update');

    Route::resource('turmas','TurmasController');
    Route::get('turmas/delete/{id}','TurmasController@destroy')->name('turmas.destroy');
    Route::post('turmas/{id}','TurmasController@update')->name('turmas.update');

    Route::resource('vagas','VagasController');
    Route::get('vagas/delete/{id}','VagasController@destroy')->name('vagas.destroy');
    Route::post('vagas/{id}','VagasController@update')->name('vagas.update');
});