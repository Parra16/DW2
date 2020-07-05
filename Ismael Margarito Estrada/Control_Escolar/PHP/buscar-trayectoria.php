<?php


$nocuenta=$_POST['nocuenta'];

include("Conexion_BD.php");
$conexion=conectar();

$consulta="SELECT * FROM `alumno` WHERE nocuenta=$nocuenta";
$resultado=mysqli_query($conexion,$consulta);
$mostrar=mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registro Calificaciones</title>
	<link rel="stylesheet" type="text/css" href="css/cssB.css">
</head>
<body>

	<form action="PHP/buscar.php" method="POST">
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
            <h6>Trayectoria academica </h6>
            <h7>Verifique si la infromación es correcta:     </h7>

            <br><br/>



            <table name="most">
                <tr>
                    <td>Nomero cuenta</td>
                    <td>Nombre</td>
                    <td>Apellido paterno</td>
                    <td>Apellido materno</td>

                </tr>

            <?php
                $sql="SELECT * from alumno where nocuenta=$nocuenta";
                $resultado=mysqli_query($conexion,$sql);

             while($mostrar=mysqli_fetch_array($resultado)) {
                    ?>

                <tr>
                    <td><?php echo $mostrar['nocuenta']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['apaterno']?></td>
                    <td><?php echo $mostrar['amaterno']?></td>

                </tr>
                <?php
                }
                ?>
                </table>


                <br><br/>



                <table name="most">
                <tr>
                    <td>Nomero cuenta</td>
                    <td>Indicador</td>
                    <td>Periodo</td>
                    <td>Creditos</td>
                    <td>Materia</td>
                    <td>Primer P.</td>
                    <td>Segundo P.</td>
                    <td>Ordinario</td>
                    <td>Extraordinario</td>

                </tr>

            <?php
                $sql="SELECT * from calificacion where nocuenta=$nocuenta";
                $resultado=mysqli_query($conexion,$sql);

             while($mostrar=mysqli_fetch_array($resultado)) {
                    ?>

                <tr>
                    <td><?php echo $mostrar['nocuenta']?></td>
                    <td><?php echo $mostrar['indicador']?></td>
                    <td><?php echo $mostrar['periodo']?></td>
                    <td><?php echo $mostrar['creditos']?></td>
                    <td><?php echo $mostrar['materia']?></td>
                    <td><?php echo $mostrar['pparcial']?></td>
                    <td><?php echo $mostrar['sparcial']?></td>
                    <td><?php echo $mostrar['ordinario']?></td>
                    <td><?php echo $mostrar['extraordinario']?></td>

                </tr>
                <?php
                }
                ?>
                </table>






                <br><br/>

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

</form>

</body>
</html>