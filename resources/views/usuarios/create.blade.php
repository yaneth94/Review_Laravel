@extends('layout')

@section('contenido')
	<div class="container">
        <h1>Crear Usuario</h1>
        <form action="{{ route('usuarios.store') }}" method="POST" >
            @include('usuarios.form',['usuario' => new App\User])
            <input class="btn btn-primary" type="submit" value="Guardar">
        </form>
    </div>
@stop
