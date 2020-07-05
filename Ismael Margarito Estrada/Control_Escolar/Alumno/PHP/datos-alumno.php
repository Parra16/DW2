
<?php

include("Conexion_BD.php");
$conexion=conectar();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Datos Personales Alumno</title>
	<link rel="stylesheet" type="text/css" href="css/cssH.css">
</head>
<body>
	<header>
		<div>
			<img src="img/logo1.png" class="logo">
		</div>
		<h1>Centro de Educacion Media Superior 22 Temoaya</h1>

		<nav>
   	     <ul class="menu">
         
            <li><a href="http://localhost/Control_Escolar/Alumno/PHP/datos-alumno.php">Datos Personales</a></li>
            <li><a href="http://localhost/Control_Escolar/Alumno/PHP/buscar-trayectoria.php">Trayectoria Academica</a></li>
			<li><a href="http://localhost/Control_Escolar/Alumno/close.html">Cerrar Sesion</a></li>       
          </ul>
		</nav>
	</header>

	<section class="wrapper">
		<section class="main">
        <br><br/>
        <h4>Datos del alumno</h4>

            
            <?php
                $sql="SELECT * from alumno";
                $resultado=mysqli_query($conexion,$sql);
                $mostrar=mysqli_fetch_array($resultado);
            ?>
                        <table></table>
            
            <label>Numero de cuenta:</label>
            <h3><?php echo $mostrar['nocuenta']?></h3>
            <table></table>

            <label>Nombre:</label>
            <h3><?php echo $mostrar['nombre']?></h3>
            <table></table>
            <label>Apellido Paterno:</label>
            <h3><?php echo $mostrar['apaterno']?></h3>
            <table></table>
            <label>Apellido Materno:</label>
            <h3><?php echo $mostrar['amaterno']?></h3>
            <table></table>
            <label>Correo:</label>
            <h3><?php echo $mostrar['correo']?></h3>
            <table></table>
            <label>Curp:</label>
            <h3><?php echo $mostrar['curp']?></h3>
            <table></table>
            <label>Direccion:</label>
            <h3><?php echo $mostrar['direccion']?></h3>
            <table></table>
            <label>Telefono:</label>
            <h3><?php echo $mostrar['telefono']?></h3>
            <table></table>
            <br><br/>
			
		
		</section>
		<aside></aside>
	</section>

	<footer>
		<br><br/>
		<p>Derechos reservados por @Colegio de bachilleres de Estado de México</p>
		<br><br/>
	</footer>

</body>
</html>