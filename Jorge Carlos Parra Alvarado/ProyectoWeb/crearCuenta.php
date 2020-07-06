<?php
require_once "cabecera.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <style>
<?php
include "css/cabecera.css";
//include "css/style.css";
?>
    </style>
    <body>
        <div>
            <form class="form-register" method="post" action="subirCuenta.php" enctype="multipart/form-data">
                <h1 style="background:#24303c; text-align: center;">Ingresa los siguientes datos</h1>
                <!--<p><label for="nombre">Nombre</label></p>-->
                <input class="controls" type="text" name="nombre" placeholder="nombre"/>
                <!--<p><label for="apellido">Apellido</label></p>-->
                <input class="controls" type="text" name="apellido" placeholder="apellido"/>
                <!--<p><label for="edad">Edad</label></p>-->
                <input class="controls" type="text" name="edad" placeholder="edad"/>
                <!--<p><label for="estado">Estado</label></p>-->
                <input class="controls" type="text" name="estado" placeholder="estado"/>
                <!--<p><label for="municipio">municipio</label></p>-->
                <input class="controls" type="text" name="municipio" placeholder="municipio"/>
                <!--<p><label for="usuario">Usuario</label></p>-->
                <input class="controls" type="text" name="usuario" placeholder="usuario"/>
                <!--<p><label for="contrasenia">Contraseña</label></p>-->
                <input class="controls" type="password" name="contrasenia" placeholder="contraseña"/>
                <!--<p><label for="telefono">Telefono</label></p>-->
                <input class="controls" type="text" name="telefono" placeholder="telfefono"/>
                <!--<p><label for="clave">Clave</label></p>-->
                <input class="controls" type="text" name="clave" placeholder="clave"/>
                <!--<p><label for="correo">Correo</label></p>-->
                <input class="controls" type="text" name="correo" placeholder="correo"/>
                <input class="botons" type="file" name="myfile"/>
                <input class="botons" type="submit" value="Registrarse" />
                
            </form>
        </div>
    </body>
</html>