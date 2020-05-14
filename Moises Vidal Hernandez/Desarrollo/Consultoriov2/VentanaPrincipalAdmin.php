<?php
	session_start();
	if ($_SESSION['nivel']!='Empleado') {
		header('Location:usuario_ingresar.php')
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ventana Principal Administrador</title>
	<link rel="stylesheet" href="CSS/EstilosVtnAdminPrincipal.CSS">
	<link rel="icon" href="Imagenes/Logo.jpg">
</head>
<body>
	<header class="header">
		<div class="container logo-nav-container">
			<a href="#" class="logo">Medisoft</a>
			<nav class="navegacion">
				<ul>
					<li><a href="#">Cerrar Sesión</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main class="main">
		<div class="content">
			<div class="acciones">
				<center>
					<form action="">
						<h2>Menu Principal</h2>
						<div class="botones">
						<input type="button" value="Administrar Usuarios" id="boton1">
						<input type="button" value="Administrar Medicamentos" id="boton2">
						<input type="button" value="Revision De Consultas " id="boton3">
						<input type="button" value="Visualizacion De Ventas" id="boton4">
						</div>
				</form>
				</center>
			</div>
		</div>
	</main>
	<footer class="footer">Contacto: Softipet@gmail.com</footer>
</body>
</html>