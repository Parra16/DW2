
<!DOCTYPE html>
<html>
    <head>
        <title>EM - Registro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="static/CSS/estilo.css" type="text/css"/>
		<link rel="stylesheet" href="static/CSS/estilo-menu.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
    </head>

    <body>
	
		<div class="contenedor-menu sidebar">
			<h2 href="#" class="btn-menu">Menú<i class=""></i></h2>
			<ul  class="menu">
			<?php 
				if(session()->get('puesto')=='ADMINISTRADOR'){
					echo "<li><a href='inicio_AD".session()->get('id')."'><i class='icono izq fa fa-home'></i>Inicio</a></li>";
			?>
					<li><a href="#"><i class="icono izq fa fa-users"></i>Empleados<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
						<li><a href="{{route('listaem')}}">Lista de empleados</a></li>
						<li><a href="{{route('repemps')}}">Lista de reportes</a></li>
						<li><a href="{{route('regem')}}">Registro de empleados</a></li>
					</ul>
				</li>
			<?php 
				}else{
					echo "<li><a href='inicio_US".session()->get('id')."'><i class='icono izq fa fa-home'></i>Inicio</a></li>";
				}
			?>
				<li><a href="#"><i class="icono izq fa fa-user"></i>Usuario<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
				<?php 
					if(session()->get('puesto')!='ADMINISTRADOR'){
				?>
						<li><a href="{{route('userrep')}}"><i class='icono izq fa fa-flag'></i>Reportes</a></li>
				<?php
					}
				?>
						<li><a href="{{route('infocont')}}">Información de contacto</a></li>
						<li><a href="{{route('pagcontra')}}">Modificar contraseña</a></li>
					</ul>
				</li>
				<li><a href="{{route('loginn')}}"><i class="icono izq fa fa-sign-out-alt"></i>Salir</a></li>
			</ul>
		</div>
		
		<div class="cuerpo">
			<div class="cabecera">
				<i class="fas fa-bars"></i>
			</div>
            @yield('seccion')
        </div>
        
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="static/JS/main.js"></script>
	<script src="static/JS/revisar.js"></script>
	<script src="static/JS/bootstrap-show-password.min.js"></script>
</html>
