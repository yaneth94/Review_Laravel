<?php

namespace App\Http\Controllers;

use App\Events\MessageWasReceived;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Cache;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['create','store']]);
    }
    public function index()
    {
       $key = "messages.page." . request('page',1);
       $messages = Cache::rememberForever($key, function () {
           return Message::with(['user','note','tags'])
                        ->orderBy('created_at', request('sorted','DESC'))
                        ->paginate(10);
       });
       /*if(Cache::has($key))
       {
           $messages = Cache::get($key);
       }
       else{
           // $messages = DB::table('messages')->get();
           //$messages = Message::with(['user','note','tags'])->simplePaginate(10);
           $messages = Message::with(['user','note','tags'])
                        ->orderBy('created_at', request('sorted','ASC'))
                        ->paginate(10);

            //Guardando en cache los resultados
            Cache::put($key,$messages,5000);
       }*/

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

        Cache::flush();
        //eventos
        event(new MessageWasReceived($message));
        //redireccionar
        return redirect()->route('messages.create')->with('info','Tu mensaje ha sido enviado correctamente');
    }

    public function show($id)
    {
        $message = Cache::rememberForever("messages.{$id}", function () use ($id){
            return Message::findOrFail($id);
        });
        //$message = DB::table('messages')->where('id',$id)->first();
        return view('messages.show', compact('message'));
    }

    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Cache::remember("messages.{$id}", 4000, function () use ($id){
            return Message::findOrFail($id);
        });
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
        Message::findOrFail($id)->update($request->all());
        Cache::flush();
        return redirect()->route('messages.index');
    }

    public function destroy($id)
    {
        //$message = DB::table('messages')->where('id',$id)->delete();
        Message::findOrFail($id)->delete();
        Cache::flush(); //tags
        return redirect()->route('messages.index');
    }
}
