@extends('layout')

@section('contenido')

	<div class="container">
        <h1>Todos los mensajes</h1>
		<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Mensaje</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
			<tr>
				<td>
					<a href="{{ route('messages.show',$message->id) }}">{{ $message->nombre }}</a>
				</td>
				<td>{{ $message->email }}</td>
				<td>{{ $message->mensaje }}</td>
				<td>
					<a  class="btn btn-info btn-xs" href="{{ route('messages.edit',$message->id) }}">Editar</a>
					<form method="POST" style="display:inline" action="{{ route('messages.destroy',$message->id) }}">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button  class="btn btn-danger btn-xs" type="submit">Eliminar</button>

					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@stop
