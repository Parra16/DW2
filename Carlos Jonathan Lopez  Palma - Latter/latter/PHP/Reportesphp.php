<html>
    <head>
        <title>EM - Registro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="/latter/CSS/estilo.css" type="text/css"/>
		<link rel="stylesheet" href="/latter/CSS/estilo-menu.css" type="text/css"/>
    </head>

    <body>
		<div class="contenedor-menu sidebar">
			<h2 href="#" class="btn-menu">Menú<i class=""></i></h2>
			<ul  class="menu">
				<li><a href="#"><i class="icono izq fa fa-home"></i>Inicio</a></li>
				<li><a href="#"><i class="icono izq fa fa-user"></i>Usuario<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
						<li><a href="#">Datos de contacto</a></li>
						<li><a href="#">Modificar contraseña</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="icono izq fa fa-users"></i>Empleados<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
						<li><a href="https://htmlcolorcodes.com/es/">Lista</a></li>
						<li><a href="#">Registro</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="icono izq fa fa-flag"></i>Reportes</a></li>
				<li><a href="http://localhost/latter/login.html"><i class="icono izq fa fa-sign-out-alt"></i>Salir</a></li>
			</ul>
		</div>
		
		<div class="cuerpo">
			<div class="cabecera" style="padding: 8.5px 10px;">
				<i class="fas fa-bars"></i>
			</div>
			<div class="content">
                <h3 class="encabezado" align="center" style="color:#930707;">Lista de reportes</h3>
				<hr>
				<div id="alerta" class="alerta"></div>
				<div>
					<table class="tabla" id="t01">
						<tbody>
                    	<tr>
                        	<th style="width:100px;">ID</th><th style="width:650px;">Nombre</th> <th>Descripción</th><th>Fecha</th><th style="width:100px;">Hora</th><th style="width:30px;">Acción</th>
                    	</tr>
                    	<tr class="fila">
                        	<td class="tdm">99</td><td>CARLOS LÓPEZ PALMA</td> <td class="treport">RETARDO</td>
							<td>13/FEBRERO/2019</td><td>8:30</td>
							<td><button type="button" class="btn btn-danger fas fa-trash-alt"></button></td>
                    	</tr>
						<?php include ('Reportes.php');?>
					</tbody>
                </table>
				</div>
                
			</div>
        </div>
        
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="/latter/JS/main.js"></script>
</html>