<?php

include("Conexion_BD.php");
$conexion=conectar();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Alumnos Registrados</title>
	<link rel="stylesheet" type="text/css" href="css/cssB.css">
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

        <h7>Busacar un alumno especifico:     </h7>
        <br><br/>

        <button name="" class="regis"> 
                <a href="http://localhost/Control_Escolar/Buscar-alumno.html">Buscar</a>     
            
            </button>
                <br><br/>

            <table name="most">
                <tr>
                    <td>Nomero cuenta</td>
                    <td>Nombre</td>
                    <td>Apellido paterno</td>
                    <td>Apellido materno</td>
                    <td name="correo">Correo</td>
                    <td>Telefono</td>
                </tr>

                <?php
                $sql="SELECT * from alumno";
                $resultado=mysqli_query($conexion,$sql);

                while ($mostrar=mysqli_fetch_array($resultado)) {
                    ?>

                

                <tr>
                    <td><?php echo $mostrar['nocuenta']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['apaterno']?></td>
                    <td><?php echo $mostrar['amaterno']?></td>
                    <td><?php echo $mostrar['correo']?></td>
                    <td><?php echo $mostrar['telefono']?></td>
                </tr>

                <?php

                }

                    ?>



            </table>

            <br><br/>
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