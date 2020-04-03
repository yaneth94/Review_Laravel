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
                <th>Notas</th>
                <th>Etiquetas</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
			<tr>
                <td>{!! $message->present()->userName() !!}</td>
                <td>{{ $message->present()->userEmail()}}</td>
                <td>{{ $message->present()->link() }}</td>
                <td>{{ $message->present()->notes() }}</td>
                <td>{{ $message->present()->tags() }}</td>
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
            {!! $messages->appends(request()->query())->links('pagination::bootstrap-4') !!}
		</tbody>
	</table>
	</div>
@stop
