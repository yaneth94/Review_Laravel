<?php

namespace App\Http\Controllers;

use App\Events\MessageWasReceived;
use Illuminate\Http\Request;
use App\Repositories\CacheMessages;

class MessagesController extends Controller
{
    protected $messages;

    public function __construct(CacheMessages $messages)
    {
        $this->messages = $messages;
        $this->middleware('auth',['except' => ['create','store']]);
    }
    public function index()
    {
       $messages = $this->messages->getPaginate();
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
        $message = $this->messages->store($request);
        //eventos
        event(new MessageWasReceived($message));
        //redireccionar
        return redirect()->route('messages.create')->with('info','Tu mensaje ha sido enviado correctamente');
    }

    public function show($id)
    {
        $message = $this->messages->findById($id);
        //$message = DB::table('messages')->where('id',$id)->first();
        return view('messages.show', compact('message'));
    }

    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = $this->messages->findById($id);
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
        $this->messages->update($request,$id);
        return redirect()->route('messages.index');
    }

    public function destroy($id)
    {
        //$message = DB::table('messages')->where('id',$id)->delete();
       $this->messages->destroy($id);
        return redirect()->route('messages.index');
    }
}
