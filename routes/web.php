<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', 'ArtikelController@index');
Route::get('/artikel/create', 'ArtikelController@create')->name('new-artikel');
Route::post('/artikel', 'ArtikelController@store');
Route::get('/artikel/{id}', 'ArtikelController@show')->name('show-artikel');
Route::get('/artikel/{id}/edit', 'ArtikelController@edit')->name('edit-artikel');
Route::put('/artikel/{id}', 'ArtikelController@update')->name('update-artikel');
Route::delete('/artikel/{id}', 'ArtikelController@destroy')->name('delete-artikel');
