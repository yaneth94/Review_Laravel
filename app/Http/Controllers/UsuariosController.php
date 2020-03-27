<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    function __construct()
    {
        $this->middleware('auth',['except' => 'show']);
        $this->middleware('roles:admin',['except' => ['edit','update','show']]);
    }

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show',compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $this->authorize('edit',$usuario);
        return view('usuarios.edit',compact('usuario'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $this->authorize('update',$usuario);
        $usuario->update($request->all());
        return back()->with('info','Usuario Actualizado Correctamente');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $this->authorize('destroy',$usuario);
        $usuario->delete();
        return back();
    }
}
