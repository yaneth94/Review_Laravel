@extends('layout')

@section('contenido')
	<div class="container">
		<h1>Editando el Mensaje de: {{ $message->nombre }}</h1>
        <form action="{{ route('messages.update',$message->id) }}" method="POST" >
            {!! method_field('PUT') !!}
            @include('messages.form',[
                'btnText' => 'Actualizar',
                'showFields' =>!$message->user_id,
                ])
        </form>
	</div>
@stop
