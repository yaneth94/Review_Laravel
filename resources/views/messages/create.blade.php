@extends('layout')

@section('contenido')
<h1>Contactos</h1>
<h2>Escribeme</h2>
@if(session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<div class="container">
	<form action="{{ route('messages.store') }}" method="POST" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<label for="nombre">
		Nombre
		<input class="form-control"  type="text" name="nombre" value="{{ old('nombre') }}">
		{!! $errors->first('nombre','<span class="error">:message</span') !!}
	</label>
	<br>
	<label for="email">
		Email
		<input class="form-control"   type="email" name="email" value="{{ old('email') }}">
		{!! $errors->first('email','<span class="error">:message</span') !!}
	</label>
	<br>
	<label for="Mensaje">
		Mensaje
		<textarea class="form-control"   name="mensaje">{{ old('email') }}</textarea>
		{!! $errors->first('mensaje','<span class="error">:message</span') !!}
	</label>
	<br>
	<input class="btn btn-primary" type="submit" value="Enviar">
</form>
<hr>
@endif
</div>
@stop