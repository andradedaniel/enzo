<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'index', 'uses' => 'DashboardController@index']);

Route::resource('/contas', 'ContaBancariaController');
Route::resource('/investidor', 'InvestidorController');
Route::resource('/aporte-financeiro', 'AporteFinanceiroController');
Route::resource('/obra', 'ObraController');
Route::resource('/despesa', 'DespesaController');
