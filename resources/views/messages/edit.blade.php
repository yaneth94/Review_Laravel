@extends('layout')

@section('contenido')
	<div class="container">
		<h1>Editando el Mensaje de: {{ $message->nombre }}</h1>

<form action="{{ route('messages.update',$message->id) }}" method="POST" >
	{!! method_field('PUT') !!}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<label for="nombre">
		Nombre
		<input class="form-control"  type="text" name="nombre" value="{{ $message->nombre  }}">
		{!! $errors->first('nombre','<span class="error">:message</span') !!}
	</label>
	<br>
	<label for="email">
		Email
		<input class="form-control"  type="email" name="email" value="{{ $message->email }}">
		{!! $errors->first('email','<span class="error">:message</span') !!}
	</label>
	<br>
	<label for="Mensaje">
		Mensaje
		<textarea class="form-control" name="mensaje">{{  $message->mensaje }}</textarea>
		{!! $errors->first('mensaje','<span class="error">:message</span') !!}
	</label>
	<br>
	<input class="btn btn-primary" type="submit" value="Enviar">
</form>
	</div>
@stop