
<?php

include("Conexion_BD.php");
$conexion=conectar();
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Datos Personales Docente</title>
	<link rel="stylesheet" type="text/css" href="css/cssN.css">
</head>
<body>
	<header>
		<div>
			<img src="img/logo1.png" class="logo">
		</div>
		<h1>Centro de Educacion Media Superior 22 Temoaya</h1>

		<nav>
   	     <ul class="menu">
         
            <li><a href="http://localhost/Control_Escolar/PHP/datos.php">Datos Personales</a></li>
            <li><a href="http://localhost/Control_Escolar/registro-alumno.html">Registro de Alumno</a></li>
            <li><a href="http://localhost/Control_Escolar/trayectoria.html">Trayectoria Academica</a></li>
            <li><a href="http://localhost/Control_Escolar/calificaciones.html">Registro de Calificaciones</a></li>
			<li><a href="http://localhost/Control_Escolar/PHP/alumnos-registrados.php">Alumnos Registrados</a></li>
			<li><a href="http://localhost/Control_Escolar/close.html">Cerrar Sesion</a></li>       
          </ul>
		</nav>
	</header>

	<section class="wrapper">
		<section class="main">
        <br><br/>
        <h4>Datos del docente</h4>

            
            <?php
                $sql="SELECT * from docente";
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
            <label>Matricula:</label>
            <h3><?php echo $mostrar['matricula']?></h3>
            <table></table>
            <label>Curp:</label>
            <h3><?php echo $mostrar['curp']?></h3>
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