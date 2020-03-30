<input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if ($showFields)
        <label for="nombre">
            Nombre
            <input class="form-control"  type="text" name="nombre" value="{{ $message->nombre ?? old('nombre') }}">
            {!! $errors->first('nombre','<span class="error">:message</span') !!}
        </label>
        <br>
        <label for="email">
            Email
            <input class="form-control"   type="email" name="email" value="{{ $message->email ?? old('email') }}">
            {!! $errors->first('email','<span class="error">:message</span') !!}
        </label>
    @endif
	<br>
	<label for="Mensaje">
		Mensaje
		<textarea class="form-control"   name="mensaje">{{ $message->mensaje ?? old('email') }}</textarea>
		{!! $errors->first('mensaje','<span class="error">:message</span') !!}
	</label>
	<br>
    <input class="btn btn-primary" type="submit" value="{{  $btnText ?? 'Guardar' }}">
