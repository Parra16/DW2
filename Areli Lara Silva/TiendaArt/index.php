<?php
include "configs/config.php";
include "configs/funciones.php";
	
if(!isset($p)){
	$p = "principal";
}else{
	$p = $p;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/estilo.css"/>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="fontawesome/css/all.css"/>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<title>Artesanias Gualupita</title>
</head>
<body>
	<div class="header">
		Artesanias Gualupita
	</div>
	<div class="menu">
		<a href="?p=principal">Principal</a>
		<a href="?p=productos">Productos</a>
		<a href="?p=ofertas">Ofertas</a>
		<?php
		if(isset($_SESSION['id_cliente'])){
		?>
		<a href="?p=carrito">Mi Carrito</a>
		<a href="?p=miscompras">Mis Compras</a>
		<?php
		}else{
			?>
				<a href="?p=login">Iniciar Sesion</a>
				<a href="?p=registro">Registrate</a>
			<?php
		}
		?>
		<a href="admin/">Panel Admin</a>
		<!--
		<a href="?p=admin">Administrador</a>
		-->

		<?php
			if(isset($_SESSION['id_cliente'])){
		?>

		<a class="pull-right subir" href="?p=salir">Salir</a>
		<a class="pull-right subir" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a>

		<?php
			}
		?>
	</div>
	<div class="cuerpo">
		<?php
			if(file_exists("modulos/".$p.".php")){
				include "modulos/".$p.".php";
			}else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";
			}
		?>
	</div>

	<div class="footer">
		Desarrollo web s6 <?=date("Y")?>
	</div>

</body>
</html>