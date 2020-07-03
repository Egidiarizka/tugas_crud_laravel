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

Route::get('/pertanyaan', 'PertanyaanController@index')->name('pertanyaan.index');
Route::get('/pertanyaan/create', 'PertanyaanController@create')->name('pertanyaan.create');
Route::post('/pertanyaan', 'PertanyaanController@store')->name('pertanyaan.store');
Route::get('/pertanyaan/{id}', 'PertanyaanController@show')->name('pertanyaan.show');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit')->name('pertanyaan.edit');
Route::put('/pertanyaan/{id}' , 'PertanyaanController@update')->name('pertanyaan.update');
Route::delete('/pertanyaan/{id}' , 'PertanyaanController@delete')->name('pertanyaan.delete');

Route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index')->name('jawaban.index');
Route::post('jawaban/{pertanyaan_id}', 'JawabanController@store')->name('jawaban.store');
