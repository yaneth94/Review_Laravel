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
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<label for="name">
		name
		<input class="form-control"  type="text" name="name" value="{{ $usuario->name  }}">
		{!! $errors->first('name','<span class="error">:message</span') !!}
	</label>
	<br>
	<label for="email">
		Email
		<input class="form-control"  type="email" name="email" value="{{ $usuario->email }}">
		{!! $errors->first('email','<span class="error">:message</span') !!}
    </label>
    <br>

	<input class="btn btn-primary" type="submit" value="Enviar">
</form>
	</div>
@stop
