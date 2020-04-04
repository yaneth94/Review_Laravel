<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>Mi Sitio</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<header>
		<?php function activeMenu($url){
			return request()->is($url) ? 'active' : '';
		} ?>
		<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
			 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		     <li class="nav-item {{ activeMenu('/') }}">
		      	<a class="nav-link"  href="{{ route('home') }}">Home</a>
		      </li>
		      <li class="nav-item {{ activeMenu('saludos/*') }}">
		        <a class="nav-link" href="{{ route('saludos','Zoila') }}">Saludos</a>
		      </li>
		       <li class="nav-item {{ activeMenu('mensajes/create') }}">
		        <a class="nav-link" href="{{ route('messages.create') }}">Contactame</a>
		      </li>
		      @guest
	           <!-- <a class="{{ activeMenu('register') }}" href="{{ route('register') }}">{{ __('Register') }}</a>-->
	            @else
	             <li class="nav-item {{ activeMenu('mensajes') }}">
	            	<a class="nav-link" href="{{ route('messages.index') }}">Mensajes</a>
                </li>
                @if(auth()->user()->hasRoles(['admin','moderador']))
                    <li class="nav-item {{ activeMenu('usuarios') }}">
                        <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                    </li>
                @endif
                @endguest

          </div>
          <ul class="nav navbar-nav navbar-right">
            @guest
            <li class="nav-item {{ activeMenu('login') }}"><a  class="nav-link" href="{{ route('login') }}"> Login</a></li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                    </form>
                <a class="dropdown-item" href="/usuarios/{{ auth()->id()}}/edit">Ver mi Perfil</a>

                </div>
              </li>
            @endguest
          </ul>
		</nav>
	</header>
	<br>
	@yield('contenido')
	<div class="container">
		<footer>
		Copyright @ {{ date('Y')}}
	</footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
	</div>
</body>
</html>
