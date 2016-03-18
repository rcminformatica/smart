<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Profile
Route::group(['as' => 'profile.', 'middleware' => 'admin','prefix' => 'profile'], function()
//Route::group(['as' => 'usuarios.',  'prefix' => 'usuarios'], function()
{

    Route::get('/', 		           ['as'  => 'index' ,  'uses' =>                'ProfileController@index']);
    Route::post('updateEmpresa', 	   ['as'  => 'updateEmpresa' ,  'uses' =>        'ProfileController@UpdateEmpresa']);



});

//Painel
Route::group(['as' => 'painel.', 'middleware' => 'admin','prefix' => 'painel'], function()
//Route::group(['as' => 'usuarios.',  'prefix' => 'usuarios'], function()
{

    Route::get('/', 		   ['as' => 'index' ,  'uses' =>                'PainelController@dashboard']);
    Route::get('dashboard',    ['as' => 'home' ,  'uses' =>                 'PainelController@dashboard']);
    Route::get('dashboard',    ['as' => 'home' ,  'uses' =>                 'PainelController@dashboard']);
    Route::get('sistemas',     ['as' => 'sistemas' ,  'uses' =>             'PainelController@sistemas']);


});
Route::group(['as' => 'transportadora.', 'middleware' => 'admin','prefix' => 'transportadora'], function()
//Route::group(['as' => 'usuarios.',  'prefix' => 'usuarios'], function()
{
    Route::get('/',               ['as' => 'index' ,  'uses' =>                   'TransportadoraController@index']);
    Route::get('adicionar',       ['as' => 'create' ,   'uses' =>                    'TransportadoraController@create']);
    Route::get('salvar',          ['as' => 'store' ,   'uses' =>                    'TransportadoraController@store']);
    Route::get('editar/{id}',     ['as' => 'edit' ,   'uses' =>                    'TransportadoraController@editar']);
    Route::post('ok',             ['as' => 'ok' ,   'uses' =>                    'TransportadoraController@ok']);



});


Route::group(['as' => 'home.', 'middleware' => 'guest','prefix' => '/'], function(){

    Route::get('/', 		 	   ['as' => 'index' ,  'uses' =>               'GuestController@index']);
    Route::get('/cadastro', 	   ['as' => 'cadastro'  ,  'uses' =>               'GuestController@create']);
    Route::post('/salvar', 		   ['as' => 'cadastro'  ,  'uses' =>               'GuestController@store']);


//
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
