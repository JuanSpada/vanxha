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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entregas', 'LinkController@entregas');
Route::get('/entregas/editar', 'PedidosController@editarcalendar');

Route::prefix('pedidos')->name('pedidos.')->group(function () {
    Route::get('/', 'PedidosController@index');
    Route::get('/calendar', 'PedidosController@calendar')->name('calendar');
    Route::post('/', 'PedidosController@store');
    Route::get('/{pedido}', 'PedidosController@show');
    Route::delete('/{pedido}/delete', 'PedidosController@destroy');
    Route::post('/{pedido}', 'PedidosController@edit');
    Route::put('/{pedido}', 'PedidosController@update');
});

Route::prefix('empresa')->name('empresa.')->group(function () {
    Route::get('/', 'EmpresasController@index');
    Route::put('/', 'EmpresasController@edit');
    Route::post('/', 'EmpresasController@addUser')->name('addUser');
    Route::delete('/{id}/delete', 'EmpresasController@deleteUser')->name('deleteUser');
}) ;


Route::get('/perfil', 'LinkController@perfil');


Route::get('/migrar', 'LinkController@migrate');