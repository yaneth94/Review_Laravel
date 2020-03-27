<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['create','store']]);
    }
    public function index()
    {
       // $messages = DB::table('messages')->get();
        $messages = Message::all();

        return view('messages.index',compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        //Message::create($request->all());
        //dd($request->all());
        $message = Message::create($request->all());
        if(auth()->check()){
            auth()->user()->messages()->save($message);
        }
        //para crear guarda el nuevo mensaje y lo asigna a la relacion
        //auth()->user()->messages()->create($request->all());

        //redireccionar
        return redirect()->route('messages.create')->with('info','Tu mensaje ha sido enviado correctamente');
    }

    public function show($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        /*$message = DB::table('messages')->where('id',$id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now(),
        ]);*/
        $message = Message::findOrFail($id)->update($request->all());
        return redirect()->route('messages.index');
    }

    public function destroy($id)
    {
        //$message = DB::table('messages')->where('id',$id)->delete();
         $message = Message::findOrFail($id)->delete();
        return redirect()->route('messages.index');
    }
}
