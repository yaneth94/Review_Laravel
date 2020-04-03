@extends('layout')

@section('contenido')

@if(session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<div class="container">
    <h1>Contactos</h1>
    <h2>Escribeme</h2>
    <form action="{{ route('messages.store') }}" method="POST" id="form">
        @include('messages.form',[
            'showFields' => auth()->guest(),
            'message' => new App\Message
            ])
    </form>
<hr>
@endif
</div>
<script>
    let Form = document.getElementById('form');
    //console.log(Form.lastElementChild)
    if(Form)
    {
        Form.addEventListener('submit', deshabilitarBoton, false)
    }
    function deshabilitarBoton() {
        Form.lastElementChild.disabled= true
        //document.getElementById('button-form').disabled = true;

    }

</script>


@stop
