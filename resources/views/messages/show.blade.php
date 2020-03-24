@extends('layout')

@section('contenido')
<div class="container">
	
	<h1>Información del Mensaje</h1>
	<p>Enviado por: {{ $message->nombre }} - {{ $message->email }}</p>
	<p>{{ $message->mensaje }}</p>
</div>

@stop