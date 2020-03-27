@extends('layout')

@section('contenido')
    <div class="container">
        <h1>{{ $usuario->name }}</h1>
    <table class="table">
        <tr>
            <th>Nombre: </th>
            <td>{{  $usuario->name }}</td>
        </tr>
        <tr>
            <th>Email: </th>
            <td>{{  $usuario->email }}</td>
        </tr>
        <tr>
            <th>Roles: </th>
            <td>
                @foreach ($usuario->roles as $role)
                    <li> {{  $role->display_name }}</li>
                @endforeach
            </td>
        </tr>
    </table>
    @can('edit',$usuario)
    <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id)}}">Editar</a>
    @endcan
    @can('destroy',$usuario)
    <form method="POST" style="display:inline" action="{{ route('usuarios.destroy',$usuario->id) }}">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <button  class="btn btn-danger btn-xs" type="submit">Eliminar</button>

    </form>
    @endcan
    </div>
@stop
