@extends('layout')

@section('contenido')
<div class="container">

	<h1>Información del Mensaje</h1>
	<p>Enviado por: {{ $message->present()->userName() }} - {{ $message->present()->userEmail() }}</p>
	<p>{{ $message->mensaje }}</p>
</div>

@stop
