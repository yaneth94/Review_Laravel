@extends('layout')

@section('contenido')

	<div class="container">
        <h1>Todos los Usuarios</h1>
        <a class="btn btn-primary pull-right my-3" href="{{ route('usuarios.create') }}">Crear Nuevo Usuario</a>
		<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Notas</th>
                <th>Tags</th>
                <th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
			<tr>
				<td>
					{!! $usuario->present()->link() !!}
				</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    {{$usuario->present()->roles() }}
                </td>
                <td>{{ $usuario->present()->notes() }}</td>
                <td>{{ $usuario->present()->tags() }}</td>
				<td>
					<a  class="btn btn-info btn-xs" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>
					<form method="POST" style="display:inline" action="{{ route('usuarios.destroy',$usuario->id) }}">
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
