<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin',['except' => ['edit','update']]);
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
        //
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
        //
    }
}
