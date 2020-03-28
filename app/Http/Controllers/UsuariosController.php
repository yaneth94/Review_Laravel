<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
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
        $roles = Role::pluck('display_name','id');
        return view('usuarios.create',compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
        $usuario = User::create($request->all());
        $usuario->roles()->attach($request->roles);
        return redirect()->route('usuarios.index');
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
        //el segundo valor se utiliza como llave y el valor de la llave esta en el primer parametro
        $roles = Role::pluck('display_name','id');
        return view('usuarios.edit',compact('usuario','roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        //return $request->all();
        $usuario = User::findOrFail($id);
        $this->authorize('update',$usuario);
        //se puede evitar que actualize la contraseña
        $usuario->update($request->only('name','email'));
        //$usuario->update($request->all());
        $usuario->roles()->sync($request->roles);
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
