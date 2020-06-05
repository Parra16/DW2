<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mis fiestas</title>
</head>

<body>

    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra" id="cambiarTituloBarra">

            </div>
        </div>
    </header>

    <main class="con-sidebar">

        <section id="contenidos">
            <h3 class="centrar-texto h-700">Mis fiestas</h3>
            <hr>
            <?php
                include 'conexion.php';
                $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //array con la informacion de la conexion de la base de datos
                //checamos la conexion en la base de datos                
                if(!$conexion){
                    die("La conexion a la base de datos falló: ". mysqli_connect_error());                
                }      
                
                $id = $_GET['id'];                           
                //consulta de la base de datos 
                $result = mysqli_query($conexion, "SELECT fechaFiesta, numeroInvitados, tipoFiesta, horaInicio, horaSalida, idUsuario,idSalon FROM fiesta where idUsuario = '$id'");
                //variable que contiene la informacion de la consulta
                $row = mysqli_fetch_assoc($result);
                //variables que separaran la informacion de la consulta
                $fechaFiesta = $row['fechaFiesta'];                                                
                $invitados = $row['numeroInvitados'];
                $tFiesta = $row ['tipoFiesta'];
                $horaInicio = $row['horaInicio'];
                $horaSalida = $row['horaSalida'];                
                $ids = $row['idSalon'];

                $count = mysqli_num_rows($result);
                if($count!=1){
                    echo"
                    <div class='tarjetaBusqueda centrar-texto h-700'>
                        <h3>No tienes fiestas organizadas</h3>
                    </div>";
                }else{
                    echo "
                    <div class='tarjetaBusqueda centrar-texto h-700'>
                        <h3>Fecha de la fiesta:</h3>
                        <p>$fechaFiesta</p>
                        <h3>Numero de invitados: </h3>
                        <p>$invitados</p>
                        <h3>Tipo de fiesta: </h3>
                        <p>$tFiesta</p>
                        <h3>Hora de inicio: </h3>
                        <p>$horaInicio</p>
                        <h3>Hora de salida: </h3>
                        <p>$horaSalida</p>
                    </div>"; 
                }           
            ?>
        </section>

        <aside class='vertical-menu contenedor-menu'>
            <div class='ajustar-imagen'>
                <img src='img/profile.png' alt='perfil'>
            </div>            
            <?php 
                echo"           
                <a href='anfitrionFiestas.php?id=$id' class='active' id='infoFiesta'>Información de mi fiesta</a>
                <a href='anfitrionOrganizar.php?id=$id' id='organizarFiesta'>Organizar fiesta</a>
                <a href='anfitrionComentar.php?id=$id&ids=$ids' id='infoSalon'>Comentarios sobre el salón</a>            
                <a href='anfitrionComentarios.php?id=$id' id='comentarios'>Mis comentarios</a>
                <a href='cerrarSesion.php' id='salir'>Salir</a>"
            ?>
        </aside>    
    </main>

    <footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <p class="copyright">Todos los Derechos Reservados 2020 &copy; </p>
        </div>
    </footer>
</body>
</body>

</html>