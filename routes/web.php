<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

//Esto es para probar el funcionamiento de cache
/*DB::listen(function($query){
    echo "<pre>{$query->sql}</pre>";
});*/

Route::get('roles', function () {
    return \App\Role::with('user')->get();
});

Route::get('/',['as'=>'home', function (){
    return view('home');
}]);


Route::get('saludos/{nombre?}', ['as' => 'saludos','uses' => 'PagesController@saludos'])->where('nombre',"[A-Za-z]+");

//Mensajes
Route::get('mensajes',['as' => 'messages.index','uses'=>'MessagesController@index']);
Route::get('mensajes/create',['as' => 'messages.create','uses'=>'MessagesController@create']);
Route::post('mensajes',['as' => 'messages.store','uses'=>'MessagesController@store']);
Route::get('mensajes/{id}',['as' => 'messages.show','uses'=>'MessagesController@show']);
Route::get('mensajes/{id}/edit',['as' => 'messages.edit','uses'=>'MessagesController@edit']);
Route::put('mensajes/{id}',['as' => 'messages.update','uses'=>'MessagesController@update']);
Route::delete('mensajes/{id}',['as' => 'messages.destroy','uses'=>'MessagesController@destroy']);
Auth::routes();

Route::resource('usuarios', 'UsuariosController');

/*Route::get('/home', 'HomeController@index')->name('home');*/
