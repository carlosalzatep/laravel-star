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

Route::get('/', 'PageControler@inicio')->name('inicio');

Route::get('/detalle/{id}', 'PageControler@detalle')->name('notas.detalle');

Route::get('/editar/{id}', 'PageControler@editar')->name('notas.editar');
Route::put('/editar/{id}', 'PageControler@update')->name('notas.update');

Route::delete('/eliminar/{id}', 'PageControler@eliminar')->name('notas.eliminar');

Route::post('/', 'PageControler@crear')->name('notas.crear');

Route::get('/post/{id?}', function($id = ''){
    return view('post', ['id' => $id]);
})->name('post');

Route::get('/foto', function(){
    return view('foto');    
})->name('foto');

Route::get('/nosotros/{nombre?}', 'PageControler@GetNosotros')->name('nosotros');

/* Route::get('/nosotros/{nombre?}', function($nombre = ''){

    $equipo = ['Juan', 'Carlos', 'Diego', 'Andrea'];
    return view('nosotros', compact('equipo', 'nombre'));    
})->name('nosotros'); */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
