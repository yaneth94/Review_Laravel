<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
	/*public function __construct()
	{
		$this->middleware('example',['only' => ['home']]);
	}*/
    public function home()
    {
    	return view('home');
    }
    public function contactos()
    {
    	return view('contactos');
    }
    public function saludos($nombre = "Invitado")
    {
	    $html = "<h2>Contenido html </h2>";
		$script = "<script> alert('Problema XSS - Cross Site Scripting!') </script>";

		$consolas = [
			/*"Play Station 4",
			"Xbox One",
			"Wii U"*/
		];
		return view('saludo', compact('nombre','html','script','consolas'));	
    }
    public function mensajes(CreateMessageRequest $request)
    {
    	/*$this->validate($request,[
    		'nombre' => 'required',
    		//'email' => ['required , 'email']
    		'email' => 'required | email',
    		'mensaje' => 'required | min:5'

    	]);*/
    	$data = $request->all();
    	/*return response()->json(['data' => $data],201)->header('TOKEN','secret');*/
    	//redirect()->route('contactos')
    	return back()->with('info','Tu mensaje ha sido enviado correctamente');

    }
}
