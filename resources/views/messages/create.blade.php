@extends('layout')

@section('contenido')

@if(session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<div class="container">
    <h1>Contactos</h1>
    <h2>Escribeme</h2>
    <form action="{{ route('messages.store') }}" method="POST" >
        @include('messages.form',['message' => new App\Message])
    </form>
<hr>
@endif
</div>
@stop
