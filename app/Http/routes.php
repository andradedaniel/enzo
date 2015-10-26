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

Route::get('/', ['as'=>'index',function () {
    return view('layout');
}]);

Route::resource('/contas', 'ContaBancariaController');
Route::resource('/investidor', 'InvestidorController');
Route::resource('/aporte-financeiro', 'AporteFinanceiroController');



//Route::get('/', 'SocioController@listarSocios');
Route::get('/oi', ['as'=>'hello',function () {
      //return url('foo');
}]);
Route::get('/oi/{nome}', function ($nome) {
    return 'Paramentro digitado: '.$nome;
});
