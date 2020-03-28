<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<label for="name">
		Nombre
		<input class="form-control"  type="text" name="name" value="{{ $usuario->name ?? old('name') }}">
		{!! $errors->first('name','<span class="error">:message</span') !!}
	</label>
	<br>
	<label for="email">
		Email
		<input class="form-control"  type="email" name="email" value="{{ $usuario->email ?? old('email')}}">
		{!! $errors->first('email','<span class="error">:message</span') !!}
    </label>
    <br>
    @unless ($usuario->id)
    <label for="password">
		Password
		<input class="form-control"  type="password" name="password">
		{!! $errors->first('password','<span class="error">:message</span') !!}
    </label>
    <br>
    <label for="password_confirmation">
		Password Confirmación
		<input class="form-control"  type="password" name="password_confirmation">
		{!! $errors->first('password_confirmation','<span class="error">:message</span') !!}
    </label>
    <br>
    @endif
    <div class="checkbox">
        @foreach ($roles as $id => $name)
        <label>
            <input
                type="checkbox"
                name="roles[]"
                {{ $usuario->roles->pluck('id')->contains($id) ? 'checked' : ''}}
                value="{{ $id }}">
            {{ $name }}
        </label>
        @endforeach
        <br>
        {!! $errors->first('roles','<span class="error">:message</span') !!}
    </div>
    <hr>
