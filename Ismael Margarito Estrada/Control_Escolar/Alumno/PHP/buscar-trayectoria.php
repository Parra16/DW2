<?php

include("Conexion_BD.php");
$conexion=conectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registro Calificaciones</title>
	<link rel="stylesheet" type="text/css" href="css/cssH.css">
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
            <li><a href="http://localhost/Control_Escolar/Alumno/PHP/datos-alumno.php">Datos Personales</a></li>
            <li><a href="http://localhost/Control_Escolar/Alumno/PHP/buscar-trayectoria.php">Trayectoria Academica</a></li>
			<li><a href="http://localhost/Control_Escolar/Alumno/close.html">Cerrar Sesion</a></li>   
          </ul>
		</nav>
	</header>

	<section class="wrapper">
		<section class="main">
			<br><br/>
            <h4>Trayectoria academica </h4>
            <h7>Verifique si la infromación es correcta:     </h7>

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
                $sql="SELECT * from calificacion where nocuenta='1771611'";
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