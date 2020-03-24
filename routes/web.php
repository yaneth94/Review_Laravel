<?php

use Illuminate\Support\Facades\Route;

/*App\User::create([
    'name' => 'Dayana',
    'email' => 'dayana@gmail.com',
    'password' => bcrypt('12345678'),
    'role' => 'moderador'
]);*/

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
