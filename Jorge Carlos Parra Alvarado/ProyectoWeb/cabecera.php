<?php

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link type="text/css" rel="stylesheet" href="css/cabecera.css"  >-->
        <link type="text/css" rel="stylesheet" href="css/master.css" >
        <title>Promocionate</title>
        <!--<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">-->
    </head>
    <body>


        <!--<div id="chat">Chat</div>-->
        <!--Inicia cabezote-->
        <header>
            <div id="logo">PROMOCIONATE</div>
            <!--<div id="icono1" class="redes">x</div>
            <div id="icono2" class="redes">x</div>
            <div id="icono3" class="redes">x</div>-->

            <nav class="navegacion">
                <ul class="menu">
                    <li><a href="index.php"><h1>Inicio</h1></a></li>
                    <?php if (isset($_SESSION['id_usuario'])): ?>
                    <li><a href="crearPublicacion.php.php"><h1>Crear Publicacion</h1></a>
                        <?php else: ?>
                    <li><a href="crearCuenta.php"><h1>Crear Cuenta</h1></a>    
                        <?php endif; ?>
                    <?php if (isset($_SESSION['id_usuario'])): ?>
                    <li><a href="includes/cerrarSesion.php"><h1>Cerrar Sesion</h1></a>
                        <?php else: ?>
                    <li><a href="login.html"><h1>Iniciar Sesion</h1></a>    
                        <?php endif; ?>

                </ul>
            </nav>
        </header>
        <!--Cierra cabezote-->
        <!--Inicia naegacion-->

