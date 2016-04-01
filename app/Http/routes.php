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

    Route::get('empresa', 		                  ['as'   => 'index'         ,   'uses'  =>         'ProfileController@index']);
    Route::get('usuario',                     ['as'   => 'UsuarioIndex'  ,   'uses' =>          'ProfileController@UsuarioIndex']);
    Route::get('usuario/edit/{id}',               ['as'   => 'UsuarioEdit'   ,   'uses' =>          'ProfileController@UsuarioEdit']);
    Route::post('usuario/update',             ['as'   => 'UsuarioUpdate' ,   'uses' =>          'ProfileController@UsuarioUpdate']);
    Route::get('usuario/create',              ['as'   => 'UsuarioCreate' ,   'uses' =>          'ProfileController@UsuarioCreate']);
    Route::post('usuario/store',              ['as'   => 'UsuarioStore'  ,   'uses' =>          'ProfileController@UsuarioStore']);
    Route::get('usuario/destroy/{id}',            ['as'   => 'UsuarioDestroy'  , 'uses' =>          'ProfileController@UsuarioDestroy']);
    Route::post('usuario/search}',            ['as'   => 'UsuarioSearch'  , 'uses' =>          'ProfileController@UsuarioSearch']);
    Route::post('empresa/update',      	          ['as'   => 'EmpresaUpdate' ,   'uses'  =>         'ProfileController@EmpresaUpdate']);


});

//Painel
Route::group(['as' => 'painel.', 'middleware' => 'admin','prefix' => 'painel'], function()
//Route::group(['as' => 'usuarios.',  'prefix' => 'usuarios'], function()
{

    Route::get('/', 		   ['as' => 'index' ,  'uses' =>                'PainelController@dashboard']);
    Route::get('dashboard',    ['as' => 'home' ,  'uses' =>                 'PainelController@dashboard']);
    Route::get('dashboard',    ['as' => 'home' ,  'uses' =>                 'PainelController@dashboard']);
    Route::get('sistemas',     ['as' => 'sistemas' ,  'uses' =>             'PainelController@sistemas']);


//TRANSPORTADORA
    Route::group(['as' => 'transportadora.', 'middleware' => 'admin','prefix' => 'transportadora'], function()
//Route::group(['as' => 'usuarios.',  'prefix' => 'usuarios'], function()
    {

        Route::get('/', 		                    ['as'   => 'index'    ,   'uses'  =>         'TransportadoraController@index']);

        Route::get('create',                        ['as'   => 'create'   ,   'uses' =>          'TransportadoraController@create']);
        Route::post('update',                        ['as'   => 'update'    ,   'uses' =>          'TransportadoraController@update']);
        Route::post('store',                        ['as'   => 'store'    ,   'uses' =>          'TransportadoraController@store']);
        Route::get('edit/{id}',                     ['as'   => 'edit'    ,   'uses' =>        'TransportadoraController@edit']);
        Route::get('destroy/{id}',                 ['as'   => 'destroy'    ,   'uses' =>        'TransportadoraController@destroy']);



    });

});
Route::group(['as' => 'cadastro.', 'middleware' => 'admin','prefix' => 'cadastro'], function()
//Route::group(['as' => 'usuarios.',  'prefix' => 'usuarios'], function()
{
    Route::get('/',               ['as' => 'index' ,  'uses' =>                   'TransportadoraController@index']);
    Route::get('adicionar',       ['as' => 'create' ,   'uses' =>                    'TransportadoraController@create']);
    Route::get('salvar',          ['as' => 'store' ,   'uses' =>                    'TransportadoraController@store']);
    Route::get('editar/{id}',     ['as' => 'edit' ,   'uses' =>                    'TransportadoraController@editar']);



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
