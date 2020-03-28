@extends('layout')

@section('contenido')
	<div class="container">
        <h1>Editar Usuario</h1>
        @if (session()->has('info'))
            <div class="alert alert-success">
                {{ session('info')}}
            </div>
        @endif
        <form action="{{ route('usuarios.update',$usuario->id) }}" method="POST" >
            {!! method_field('PUT') !!}
            @include('usuarios.form')
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
	</div>
@stop
