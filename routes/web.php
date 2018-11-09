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

Route::prefix('pedidos')->group(function () {
    Route::get('/', 'PedidosController@index');
    Route::post('/', 'PedidosController@store');
    Route::get('/{pedido}', 'PedidosController@show');
    Route::delete('/{pedido}/delete', 'PedidosController@destroy');
    Route::post('/{pedido}', 'PedidosController@edit');
    Route::put('/{pedido}', 'PedidosController@update');
});